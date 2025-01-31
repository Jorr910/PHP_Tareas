import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import "./Profile.css";
import Navbar from "../../components/header/Header";
import Estadisticas from "../Stadistic/Estadisticas";
import Footer from "../../components/footer/Footer";

const Profile = () => {
  const navigate = useNavigate();
  const [user, setUser] = useState(null);

  useEffect(() => {
    const token = localStorage.getItem("token");
    const loginTime = localStorage.getItem("loginTime");
    const storedUser = localStorage.getItem("user");

    if (storedUser) {
      setUser(JSON.parse(storedUser));
    }

    if (!token || !loginTime) {
      navigate("/login");
      return;
    }

    // Definimos el tiempo del inicio de sesión (1min)
    const interval = setInterval(() => {
      const elapsedTime = Date.now() - parseInt(loginTime, 10);
      if (elapsedTime > 60000) {
        localStorage.removeItem("token");
        localStorage.removeItem("loginTime");
        localStorage.removeItem("user");
        navigate("/login");
      }
    }, 1000);

    return () => clearInterval(interval);
  }, [navigate]);

  return (
    <div className="profile-page">
      <Navbar />
      <div className="Container">
        <h1>PERFIL DEL USUARIO</h1>
        {user && (
          <h2>
            Bienvenido, {user.name} {user.last_name} ({user.email})
          </h2>
        )}
        <div className="container-buttons">
          <button
            onClick={() => {
              localStorage.removeItem("token");
              localStorage.removeItem("loginTime");
              localStorage.removeItem("user");
              navigate("/login");
            }}
          >
            Cerrar sesión
          </button>

          <button
            className="estadistica-btn"
            onClick={() => navigate("/estadistica")}
          >
            Ver Estadísticas
          </button>

          <button className="edit-btn" onClick={() => navigate("/editprofile")}>
            Modificación de usuario
          </button>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Profile;