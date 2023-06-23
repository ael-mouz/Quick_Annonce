import React from "react";
import img_1 from '../images/img_1.svg';
import "bootstrap/dist/css/bootstrap.min.css";
import '../index.css';


const AboutUs = () => {

    const imgStyle = {
        width : '100px'
    }
  return (
    <>
      <div class="col-12 d-flex justify-content-between py-4 container">
        <div class="col-4 d-flex justify-content-between">
          <img style={imgStyle} class="rounded-circle" src={img_1} alt="bar3"></img>
          <div class="d-flex flex-column justify-content-start align-items-center">
            <div class="number-circle">1</div>
            <h4 class="about-us-title">Trouver la bonne affaire</h4>
            <p class="about-us-text">
              pour voir les offres pres de chez vous,selectionnez votre ville ou
              la categorie qui vous interesse.
            </p>
          </div>
        </div>
        <div class="col-4 d-flex justify-content-between">
          <img
          style={imgStyle}
            class="circular--landscape"
            src={img_1}
            alt="bar3"
          ></img>
          <div class="d-flex flex-column justify-content-start align-items-center">
            <div class="number-circle">2</div>
            <h4 class="about-us-title">Contactez le vendeur</h4>
            <p class="about-us-text">
              quand vous avez trouve l'objet que vour rechercher, contactez le
              vendeur par email ou par telephon.
            </p>
          </div>
        </div>
        <div class="col-4 d-flex justify-content-between">
          <img
            style={imgStyle}
            class="circular--landscape"
            src={img_1}
            alt="bar3"
          ></img>
          <div class="d-flex flex-column justify-content-start align-items-center">
            <div class="number-circle">3</div>
            <h4 class="about-us-title">Faites la bonne affaire</h4>
            <p class="about-us-text">
              rencontrez le vendeur et faites la bonne affaire.
            </p>
          </div>
        </div>
      </div>
    </>
  );
};



export default AboutUs;