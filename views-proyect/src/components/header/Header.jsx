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
            className="nav-link"
            activeClassName="active-link"
          >
            PERFIL
          </NavLink>
        </li>

        <li>
          <NavLink
            to="/estadisticas"
            className="nav-link"
            activeClassName="active-link"
          >
            ESTADÍSTICAS
          </NavLink>
        </li>

        <li>
          <NavLink
            to="/editprofile"
            className="nav-link"
            activeClassName="active-link"
          >
            MODIFICAR PERFIL
          </NavLink>
        </li>
      </ul>
    </nav>
  );
};

export default NavigationBar;
