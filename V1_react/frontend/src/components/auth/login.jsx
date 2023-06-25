import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import Lock from '../../images/lock.svg'
import banner from '../../images/banner2.svg'

import axios from "axios";

const LoginForm = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("http://127.0.0.1:8000/api/login", {
        email,
        password,
      });
      if (response.data.userRole === "admin") {
        const data = { 
          id : response.data.id,
          token: response.data.token,
          name: response.data.username,
        };
        console.log(data.id);
        navigate("/admin/Home", { state: data });
      } else {
        const data = {
          token: response.data.token,
          name: response.data.username,
        };
        navigate("/user/Home", { state: data });
      }
    } catch (error) {
      // Handle registration errors
      setError(error.response.data.message);
    }
  };

  return (
    <div className="d-flex col-12">
     <form className="form col-7 border  rounded p-3" onSubmit={handleSubmit}>
     {error && <p className="alert alert-danger">{error}</p>}
     <div className="bar-banner col-10">
        <img src={banner} alt="user" className="col-12" style={{width: "100%"}}/>
        <div className="bar-banner-title">
            <img src={Lock} alt="user"/>
            <span>Se Connecter</span>
        </div>
    </div>
    <div class="mt-2">
        <div class="row">
            <div class="col-7">
            <input className="form-control" type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)}   placeholder="Nom d'utilisateur" required/>
            </div>
        </div>
        <div className="row">
            <div class="col-7">
                <input className="form-control" type="password" id="password" value={password} onChange={(e) => setPassword(e.target.value)} placeholder="Mot de pass" required/>
            </div>
            <div className="form-group col-2 ">
                <button type="submit" className="btn btn-primary">Connexion</button>
            </div>
        </div>
    </div>
     </form>
      
    </div>
  );
};

export default LoginForm;