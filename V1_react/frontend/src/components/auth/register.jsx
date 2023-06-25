import React, { useState, useEffect } from 'react';
import axios from 'axios';
import "bootstrap/dist/css/bootstrap.min.css";
import Lock from '../../images/lock.svg'
import banner from '../../images/banner2.svg'


const RegisterForm = () => {
  const [formData, setFormData] = useState({
    username: '',
    firstname: '',
    lastname: '',
    password: '',
    c_password: '',
    phone: '',
    email: '',
    gender: '',
  });
  const [error, setError] = useState("");


  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    console.log(formData)
    e.preventDefault();
    try {
      const response = await axios.post('http://127.0.0.1:8000/api/register', formData);
      alert('bien reister login')
      
      // Clear the form inputs
      setFormData([]);
      console.log(response.data); // Handle the API response
    } catch (error) {
      console.error(error); // Handle any errors
      setError(error.response.data.message);
    }
  };

  return (
    
    <>
    <div>
      
      <form className="form col-8 border  rounded p-3" onSubmit={handleSubmit}>
      {error && <p className="alert alert-danger">{error}</p>}
     <div className="bar-banner col-10">
        <img src={banner} alt="user" className="col-12" style={{width: "100%"}}/>
        <div className="bar-banner-title">
            <img src={Lock} alt="user"/>
            <span>Register</span>
        </div>
    </div>
        <div>
          <input
            type="text"
            name="username"
            value={formData.username}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Nom d'utilisateur" required
          />
        </div>
        <div>
          <input
            type="text"
            name="firstname"
            value={formData.firstname}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Prenom" require
          />
        </div>
        <div>
          <input
            type="text"
            name="lastname"
            value={formData.lastname}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Nom" require
          />
        </div>
        <div>
          <input
            type="password"
            name="password"
            value={formData.password}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Password" require
          />
        </div>
        <div>
          <input
            type="password"
            name="c_password"
            value={formData.c_password}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Confirme password" require
          />
        </div>
        <div>
          <input
            type="tel"
            name="phone"
            value={formData.phone}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Tel" require
          />
        </div>
        <div>
          <input
            type="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            class="form-control mb-1 mt-2"  placeholder="Email" require
          />
        </div>
        <div>
          <select class="form-select mb-1" name="gender" value={formData.gender} onChange={handleChange} require>
            <option value="">Select Gender</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="other">Other</option>
          </select>
        </div>
        <br></br>
        <button className='btn btn-primary' type="submit">S'inscrire</button>
      </form>
    </div></>
  );
};

export default RegisterForm;
