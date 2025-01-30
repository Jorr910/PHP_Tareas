import React, { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import "./Estadisticas.css";
import NavBar from "../../components/header/Header";

const Estadisticas = () => {
  const navigate = useNavigate();
  const [estadisticas, setEstadisticas] = useState({
    dia: 0,
    semana: 0,
    mes: 0,
  });
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchEstadisticas = async () => {
      const token = localStorage.getItem("token");
      if (!token) {
        navigate("/login");
        return;
      }

      try {
        const headers = { Authorization: `Bearer ${token}` };
        // Separamos la fecha de hoy en un dato que nos funcione
        const today = new Date().toISOString().split("T")[0];

        // mandamos a solicitar los datos con una Promesa HTTP

        const [diaRes, semanaRes, mesRes] = await Promise.all([
          axios.get(`http://127.0.0.1:8000/api/estadistica/dias/${today}`, {
            headers,
          }),
          axios.get("http://127.0.0.1:8000/api/estadistica/semana/1", {
            headers,
          }),
          axios.get("http://127.0.0.1:8000/api/estadistica/mes/1", { headers }),
        ]);

        // Visualizamos por cualquier cosa.
        console.log(
          "Datos obtenidos:",
          diaRes.data,
          semanaRes.data,
          mesRes.data
        );

        // actualizamos los datos con los datos optenido, actualizamos su estaado.

        setEstadisticas({
          dia: diaRes.data["Usuarios Registrados este dia: "] || 0,
          semana: semanaRes.data["cantidad Usuarios por semana"] || 0,
          mes: mesRes.data["cantidad Usuarios por mes"] || 0,
        });

        // terminamos la carga. 

        setLoading(false);

      } catch (err) {

        // si pasa un error, lo vemos en consola. 
        
        console.error(
          "Error al obtener estadísticas:",
          err.response?.data || err.message
        );
        setError("Error al obtener estadísticas");
        setLoading(false);
      }
    };

    fetchEstadisticas();
  }, [navigate]);

  return (
    <div>
      <NavBar />
      <div className="container">
        <h1>ESTADÍSTICAS</h1>
        {loading ? (
          <p>Cargando...</p>
        ) : error ? (
          <p className="error">{error}</p>
        ) : (
          <div className="estadisticas">
            <div className="estadistica-box">
              <h3>Usuarios registrados hoy</h3>
              <p>{estadisticas.dia}</p>
            </div>
            <div className="estadistica-box">
              <h3>Usuarios registrados esta semana</h3>
              <p>{estadisticas.semana}</p>
            </div>
            <div className="estadistica-box">
              <h3>Usuarios registrados este mes</h3>
              <p>{estadisticas.mes}</p>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default Estadisticas;
