// // gestion ...import React from "react";
import Lock from "../../images/lock.svg";
import banner from "../../images/banner2.svg";
import '../../index.css'
import UserGestionTable from "../tables/adminTables/TableGestionUsers";
import ValidatePosts from "../tables/adminTables/TableValidePosts";
import DeletePostsTable from "../tables/adminTables/TableDeletePosts";
import GestionCategories from "../tables/adminTables/TableGestionCategories";
import GestionCities from "../tables/adminTables/TableGestionCities";
import ShowPosts from "../tables/adminTables/TableShowPostsFiltred ";
import ShowPostHome from "../tables/adminTables/AcuileShowPosts";
import CreatePostForm from "../tables/user/ShowAndCreatePosts";
import React, { useState } from "react";

// Define the content components for each sidebar item
const HomeContent = () => <ShowPostHome/>;
const AdValidationContent = () => <ValidatePosts/>;
const CityManagementContent = () => <GestionCities/>;
const CategoryManagementContent = () => <GestionCategories/>;
const DeleteMemberContent = () => <UserGestionTable/>;
const DeleteAdContent = () => <DeletePostsTable/>;
const MesAnnonce = () => <CreatePostForm/>;

const Sidebar = ({ onItemClick }) => {
    
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
                    onClick={() => onItemClick("adValidation")}
                >
                    Validation des annonces
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("cityManagement")}
                    
                >
                    Gestion des villes
                </li>
                <li 
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("categoryManagement")}
                >
                    Gestion des catégories
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("deleteMember")}
                >
                    Supprimer un membre
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("deleteAd")}
                >
                    Supprimer une annonce
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("showPosts")}
                >
                    Mes Annonces
                </li>
            </ul>
        </div>
    );
};

const AdminSideBare = () => {
    const [content, setContent] = useState("home"); // State to track the current content

    const handleItemClick = (item) => {
        setContent(item);
    };

    const RenderContent = () => {
        switch (content) {
            case "home":
                return <HomeContent />;
            case "adValidation":
                return <AdValidationContent />;
            case "cityManagement":
                return <CityManagementContent />;
            case "categoryManagement":
                return <CategoryManagementContent />;
            case "deleteMember":
                return <DeleteMemberContent />;
            case "deleteAd":
                return <DeleteAdContent />;
            case "showPosts":
                return <CreatePostForm />;
            default:
                return null;
        }
    };

    return (
        <div className="container col-12">
            <div className="row  mt-4 ">
            <div className="col-3">
                <Sidebar onItemClick={handleItemClick} />
            </div>
            <div className="col-9 text-center float-sm-left" >
                <RenderContent/>
            </div>
            </div>
        </div>
    );
};

export default AdminSideBare;
