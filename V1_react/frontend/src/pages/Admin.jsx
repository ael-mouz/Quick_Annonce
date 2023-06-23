import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import { useLocation } from "react-router-dom";
import userLogo from "../images/user.svg";

const style = {
  background: "rgb(22 134 227)",
  padding: "8px 20px",
};
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
        style={style}
        class="container d-flex justify-content-between text-white "
      >
        <div>Pannel d'administration</div>
        
        <div style={{ marginLeft: "60%" }} class="nav-link ">
          <img src={userLogo} alt="user" />
          <strong> Bienvenue {username}</strong>
        </div>
        <div class="nav-link ">
          <button className="btn btn-light" onClick={handleLogout}>Deconnecxion</button>
          {error && <p>{error}</p>}
        </div>
      </div>
    </>
  );
};

export default AdminHome;
