import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';


const GestionCategories = () => {
    const [category, setCategory] = useState('');
    const [label, setLabel] = useState('');
    const [description, setDescription] = useState('');
    const [categories, setCategories] = useState([]);
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    
    // Handel submiting of the data
    const handleSubmit = async (e)  => {
        e.preventDefault();
        try{
            const response = await axios.post('http://127.0.0.1:8000/api/category/create' , 
            {category,
            label,
            description});
            console.log('created')
        }catch (error){
            console.log('Error : ' ,error)
        }
        // Clear the form fields
        setCategory('');
        setLabel('');
        setDescription('');
      };


    //fetching the users data
    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/category/findall"
                );
                setCategories(response.data.categories);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchCategories();
    }, []);

    // // handling delete -------------
    const  HandelDelete =  (categoryId ) => {
        confirmAlert ( {
          title: 'Confirmation',
          message: 'Are you sure you want to delete this Category?',
          buttons: [
            {
              label: 'Yes',
              onClick: () => {
                Delete(categoryId)
                console.log('Category deleted!');
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
          
    const Delete = async (categoryId ) => {
        try{
            const config = {
                headers: {
                  Authorization: `Bearer ${token}`,
                },
            };

            await axios.get(`http://127.0.0.1:8000/api/category/destroy/${categoryId}` , config);
            setCategories((prevCategories) => prevCategories.filter((category) => category.id !== categoryId));
        }catch(error) {
            console.log('Error : ' ,error);
        }
    };
    // ---------------------------
    // cheking if the array is empty
    if (!Array.isArray(categories)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <div className="">
        <h2>Create Category</h2>
        <form className="mb-5 border p-4" onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="category" className="form-label">Category</label>
            <input
            required
              type="text"
              className="form-control"
              id="category"
              value={category}
              onChange={(e) => setCategory(e.target.value)}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="label" className="form-label">Label</label>
            <input
                required
              type="text"
              className="form-control"
              id="label"
              value={label}
              onChange={(e) => setLabel(e.target.value)}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="description" className="form-label">Description</label>
            <textarea
            required
              className="form-control"
              id="description"
              value={description}
              onChange={(e) => setDescription(e.target.value)}
            ></textarea>
          </div>
          <button type="submit" className="btn btn-primary">Create</button>
        </form>
  
        <h2>Categories</h2>
        <table className="table mb-5">
          <thead>
            <tr>
              <th>Category</th>
              <th>Label</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {categories.map((category, index) => (
              <tr key={index}>
                <td>{category.category}</td>
                <td>{category.label}</td>
                <td>{category.description}</td>
                <td>
                    <button className="btn btn-danger"  variant="danger"  onClick={() => HandelDelete(category.id)} >
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

export default GestionCategories;
