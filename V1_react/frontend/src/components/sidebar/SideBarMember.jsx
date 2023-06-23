import React from "react";
import Lock from '../../images/lock.svg'
import banner from '../../images/banner2.svg'

const UserSideBare = () => {
  return(
        <div className="col-7 ">
            <div class="bar-banner">
            <img src={banner} alt="user" width="100%"/>
            <div class="bar-banner-title">
                <img src={Lock} alt="user"/>
                <span>Menu</span>
            </div>
            </div>
            <ul class="list-group list-group-flush mt-2">
                <li class="list-group-item" style={{background: "#4E90FE"}}>accueil</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>immobilier</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>multimidia</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>maison</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>vehicules</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>emploi & servicess</li>
                <li class="list-group-item" style={{background: "#4E90FE"}}>objects personnels</li>
            </ul>
        </div>
  ) ;
};


export default UserSideBare