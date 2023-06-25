// // gestion ...import React from "react";
import Lock from "../../images/lock.svg";
import banner from "../../images/banner2.svg";
import '../../index.css';
import ShowPosts from "../tables/adminTables/TableShowPostsFiltred ";
import ShowPostHome from "../tables/adminTables/AcuileShowPosts";
import FilteredDataComponent from "../FilterBar";
import React, { useState } from "react";

// Define the content components for each sidebar item
const HomeContent = () => <FilteredDataComponent/>;
const Immobilier = () => <div>immobilier</div>;
const Multimedia = () => <div>Multimedia</div>;
const Maison = () => <div>Maison</div>;
const Vecuille = () => <div>Vecuille</div>;
const EmplioEtservices = () => <div>Emplio et services</div>;
const MesAnnonce = () => <div>Multimedia</div>;


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
                    onClick={() => onItemClick("immobilier")}
                >
                    immobilier
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("multimedia")}
                    
                >
                    Multimedia
                </li>
                <li 
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("maison")}
                >
                    Maison
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("vecuille")}
                >
                    Vecuille
                </li>
                <li
                    role="button"
                    class="list-group-item "
                    style={{ background: "#4E90FE" }}
                    onClick={() => onItemClick("emplioEtservices")}
                >
                    Emplio et services
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

const UserSideBare = () => {
    const [content, setContent] = useState("home"); // State to track the current content

    const handleItemClick = (item) => {
        setContent(item);
    };

    const RenderContent = () => {
        switch (content) {
            case "home":
                return <HomeContent />;
            case "Immobilier":
                return <Immobilier/>;
            case "Multimedia":
                return <Multimedia />;
            case "Maison":
                return <Maison />;
            case "Vecuille":
                return <Vecuille />;
            case "EmplioEtservices":
                return <EmplioEtservices />;
            case "showPosts":
                return <ShowPosts />;
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

export default UserSideBare
