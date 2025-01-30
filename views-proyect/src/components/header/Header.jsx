import React from "react";
import { NavLink } from "react-router-dom";
import "./Header.css";
import logo from "../../assets/img/0001.png";

const NavigationBar = () => {
  return (
    <nav className="navigation-bar">
      <div className="logo-container">
        <img src={logo} alt="Logo" className="logo" />
      </div>
      <ul className="nav-links">
        <li>
          <NavLink 
            to="/profile" 
            className={({ isActive }) => isActive ? "nav-link active-link" : "nav-link"}
          >
            PERFIL
          </NavLink>
        </li>

        <li>
          <NavLink 
            to="/estadistica" 
            className={({ isActive }) => isActive ? "nav-link active-link" : "nav-link"}
          >
            ESTADÍSTICAS
          </NavLink>
        </li>

        <li>
          <NavLink 
            to="/editprofile" 
            className={({ isActive }) => isActive ? "nav-link active-link" : "nav-link"}
          >
            MODIFICAR PERFIL
          </NavLink>
        </li>
      </ul>
    </nav>
  );
};

export default NavigationBar;
