import React from "react";
import logo from '../../images/logo.png';
import cart from '../../images/cart.svg';
import "bootstrap/dist/css/bootstrap.min.css";


const Header = () => {
  return (
    <>
      <nav aria-label="row-2" class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-between">
          <div className="col-3">
            <img
              className="logo col-8"
              src={logo}
              alt="Quick annonce"
            />
          </div>
          <div className="col-6">
            <div class="input-group">
              <input
                type="search"
                class="form-control"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="search-addon"
              />
              <button type="button" class="btn btn-primary">
                Search
              </button>
            </div>
          </div>
          <div className="ol-3 d-flex justify-content-center align-items-center">
            <div class="input-group">
              <img
                class="form-control btn btn-secondary"
                src={cart}
                alt="cart"
              ></img>
              <button type="button" className="btn btn-primary">
                Deposer votre Annonce
              </button>
            </div>
          </div>
        </div>
      </nav>
      <div
        class="btn-group form-control bg-primary container d-flex rounded "
        role="group"
        aria-label="Basic example"
      >
        <button type="button" class="btn btn-primary">
          accueil
        </button>
        <button type="button" class="btn btn-primary">
          immobilier
        </button>
        <button type="button" class="btn btn-primary">
          multimidia
        </button>
        <button type="button" class="btn btn-primary">
          maison
        </button>
        <button type="button" class="btn btn-primary">
          vehicules
        </button>
        <button type="button" class="btn btn-primary">
          emploi & services
        </button>
        <button type="button" class="btn btn-primary">
          objects personnels
        </button>
      </div>
    </>
  );
};


export default Header;