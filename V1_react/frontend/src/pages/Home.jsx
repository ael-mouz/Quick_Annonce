import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import userLogo from "../images/user.svg";
import lockUser from "../images/lock.svg";
import HeaderHome from "../components/headers/HeaderHome";
import AboutUs from "../components/AboutUs";
import LoginForm from "../components/auth/login";
import RegisterForm from "../components/auth/register";
import HomeSideBare from "../components/sidebar/SideBarContentHome";

const style = {
    background: "#5390ed",
    padding: "8px 20px",
};
const Home = () => {
    return (
        <div className="">
            <div
                style={style}
                class="container d-flex justify-content-between text-white align-items-center"
            >
                <div>
                    <u>
                        <strong>Nouveau !</strong> Créez un compte aujourd'hui
                        pour déposer votre annonce gratuitement!
                    </u>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="nav-link pe-5">
                        <img src={userLogo} alt="user" />
                        <u>
                            <strong>Creer compte</strong>
                        </u>
                    </div>
                    <div class="nav-link  pe-5">
                        <img src={lockUser} alt="user" />
                        <u>
                            <strong>Se connecter</strong>
                        </u>
                    </div>
                </div>
            </div>
            <HeaderHome />
            <AboutUs />
            <div className="container">
                <div className="row ">
                    <div className="col">
                        <HomeSideBare />
                    </div>
                </div>
                <hr></hr>
                <div className="row ">
                    <div className="col-6">
                        <LoginForm />
                    </div>
                    <div className="col-6">
                        <RegisterForm />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Home;
