import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';


const GestionCities = () => {
    const [name, setName] = useState('');
    const [zipcode, setZipcode] = useState('');
    const [cities, setCities] = useState([]);
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    
    // Handel submiting of the data
    const handleSubmit = async (e)  => {
        e.preventDefault();
        try{
            const response = await axios.post('http://127.0.0.1:8000/api/city/create' , 
            {name,
            zipcode
          });
            console.log('created')
        }catch (error){
            console.log('Error : ' ,error)
        }
        // Clear the form fields
        setName('');
        setZipcode('');
      };


    //fetching the cities
    useEffect(() => {
        const fetchCities = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/city/findall"
                );
                setCities(response.data.cities);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchCities();
    }, []);

    // // handling delete -------------
    const  HandelDelete =  (cityId ) => {
        confirmAlert ( {
          title: 'Confirmation',
          message: 'Are you sure you want to delete this city?',
          buttons: [
            {
              label: 'Yes',
              onClick: () => {
                Delete(cityId)
                console.log('city deleted!');
              }
            },
            {
              label: 'No',
              onClick: () => {
                console.log('Deletion canceled!');
              }
            }
          ]
        });
      };
          
    const Delete = async (cityId ) => {
        try{
            const config = {
                headers: {
                  Authorization: `Bearer ${token}`,
                },
            };

            await axios.get(`http://127.0.0.1:8000/api/city/destroy/${cityId}` , config);
            setCities((prevCities) => prevCities.filter((city) => city.id !== cityId));
        }catch(error) {
            console.log('Error : ' ,error);
        }
    };
    // ---------------------------
    // cheking if the array is empty
    if (!Array.isArray(cities)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <div className="text-center">
        <h2>Create Ville</h2>
        <form className="mb-5 border p-4" onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="name" className="form-label">Name</label>
            <input
            required
              type="text"
              className="form-control"
              id="name"
              value={name}
              onChange={(e) => setName(e.target.value)}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="zipcode" className="form-zipcode">Zipcode</label>
            <input
                required
              type="text"
              className="form-control"
              id="zipcode"
              value={zipcode}
              onChange={(e) => setZipcode(e.target.value)}
            />
          </div>
          <button type="submit" className="btn btn-primary">Create</button>
        </form>
  
        <h2>villes</h2>
        <table className="table mb-5">
          <thead>
            <tr>
              <th>Nmae</th>
              <th>Zipcode</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {cities.map((city, index) => (
              <tr key={index}>
                <td>{city.name}</td>
                <td>{city.zipcode}</td>
                <td>
                    <button className="btn btn-danger"  variant="danger"  onClick={() => HandelDelete(city.id)} >
                        Delete
                    </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    );
};

export default GestionCities;
