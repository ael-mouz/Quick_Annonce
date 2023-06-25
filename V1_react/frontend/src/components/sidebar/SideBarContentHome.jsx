// // gestion ...import React from "react";
import Lock from "../../images/lock.svg";
import banner from "../../images/banner2.svg";
import "../../index.css";
import axios from "axios";
import React, { useState, useEffect } from "react";
import FilteredDataComponent from "../FilterBar";



const Sidebar = ({ onItemClick }) => {
    const [category, setCategory] = useState();
    const [posts, setPosts] = useState();


    const handleFilterChange = (event) => {
        const { name, value } = event.target;
        setCategory((prevFilters) => ({ ...prevFilters, [name]: value }));
    };



    //fetching the users data
    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/post/findall"
                );
                setPosts(response.data.posts);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchPosts();
    }, []);

   
    return (
        <div>
            <div class="bar-banner">
                <img src={banner} alt="user" width="100%" />
                <div class="bar-banner-title">
                    <img src={Lock} alt="user" />
                    <span>Menu</span>
                </div>
            </div>
            <ul id="side_admin_li" className="list-group list-group-flush mt-2">
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("home")}
                >
                    Accueil
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    // onClick={() => onItemClick("adValidation")}
                >
                    immobilier
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    // onClick={() => onItemClick("cityManagement")}
                >
                    multimidia
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    // onClick={() => onItemClick("categoryManagement")}
                >
                    maison
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    // onClick={() => onItemClick("deleteMember")}
                >
                    vehicules
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    // onClick={() => onItemClick("deleteAd")}
                >
                    emploi & services
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("showPosts")}
                >
                    objects personnels
                </li>
            </ul>
        </div>
    );
};

const HomeSideBare = () => {
    const [content, setContent] = useState("home"); // State to track the current content

    const handleItemClick = (item) => {
        setContent(item);
    };

    return (
        <div className="container col-12">
            <div className="row  mt-4 ">
                <div className="col-3">
                    <Sidebar onItemClick={handleItemClick} />
                </div>
                <div className="col-9 text-center float-sm-left">
                    <FilteredDataComponent />
                </div>
            </div>
        </div>
    );
};

export default HomeSideBare;
