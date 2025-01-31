import React from "react";
import { NavLink } from "react-router-dom";
import "./Header.css";
import logo from "../../assets/img/0001l.webp";

const NavigationBar = () => {
  return (
    <nav className="navigation-bar">
      <div className="logo-container">
        <img src={logo} alt="Logo" className="logo" />
      </div>
      <ul className="nav-links">
        <li>
          <NavLink 
            to="/home" 
            className={({ isActive }) => isActive ? "nav-link active-link" : "nav-link"}
          >
            INICIO
          </NavLink>
        </li>

        <li>
          <NavLink 
            to="/solicitud" 
            className={({ isActive }) => isActive ? "nav-link active-link" : "nav-link"}
          >
            SOLICITAR UNA CANCIÓN
          </NavLink>
        </li>

        
      </ul>
    </nav>
  );
};

export default NavigationBar;