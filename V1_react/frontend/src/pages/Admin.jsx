import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import { useLocation } from "react-router-dom";
import userLogo from "../images/user.svg";
import Header from "../components/headers/Header";
import AdminSideBare from "../components/sidebar/SideBarContentAdmin";

const AdminHome = () => {
  const navigate = useNavigate();
  const [error, setError] = useState("");
  const location = useLocation();
  const token = location.state.token;
  const username = location.state.name;
  console.log(token);

  const handleLogout = async (e) => {
    e.preventDefault();

    try {
      await axios.post(
        "http://127.0.0.1:8000/api/logout",
        {},
        {
          headers: {
            Accept: "application/json",
            Authorization: `Bearer ${token}`,
          },
        }
      );
      navigate("/");
    } catch (error) {
      // Handle registration errors
      setError(error.response.data.message);
    }
  };

  return (
    <>
      <div
        class="container d-flex justify-content-between text-white bg-primary "
        style={{padding : '8px 20px'}}
      >
        <div><u>Pannel d'administration</u></div>
        
        <div style={{ marginLeft: "60%" }} class="nav-link ">
          <img src={userLogo} alt="user" />
          <strong> Bienvenue {username}</strong>
        </div>
        <div class="nav-link ">
          <button className="btn btn-light" onClick={handleLogout}>Deconnecxion</button>
          {error && <p>{error}</p>}
        </div>
      </div>
      <Header/>
      
      <div className="container">
          <div className="row ">
          <AdminSideBare />
        </div>
      </div>
    </>
  );
};

export default AdminHome;
