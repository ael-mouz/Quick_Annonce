import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';
import FilteredDataComponent from "../../FilterBar";


const ShowPostHome = () => {
    // const location = useLocation();
    // const token = location.state.token;
    // const id = location.state.id;
    // const username = location.state.name;
    // const [success, setSuccess] = useState('');

    

    return (
        <>  
        <FilteredDataComponent/>
        </>
    );
};

export default ShowPostHome;
