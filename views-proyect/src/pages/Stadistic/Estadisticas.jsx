import React, { useState, useEffect } from "react";
import axios from "axios";
import "./Estadisticas.css";
import NavBar from "../../components/header/Header";

const Estadisticas = () => {
  // Estados para los rangos de consultas.
  const [tipo, setTipo] = useState("dia");
  const [fecha, setFecha] = useState("");
  const [mes, setMes] = useState("");
  const [anio, setAnio] = useState("");

  // Estado para la API
  const [estadistica, setEstadistica] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  // Función para obtener la fecha actual en formato "AAAA-MM-DD"
  const getCurrentDate = () => {
    const today = new Date();
    return today.toISOString().split("T")[0]; // Devuelve "YYYY-MM-DD"
  };

  // Efecto para actualizar la fecha automáticamente cuando el tipo es "día"
  useEffect(() => {
    if (tipo === "dia") {
      setFecha(getCurrentDate());
    }
  }, [tipo]);

  // Función para obtener estadísticas
  const fetchEstadisticas = async () => {
    setLoading(true);
    setError(null);
    setEstadistica(null);

    // Obtener el token para autenticación
    const token = localStorage.getItem("token");
    if (!token) {
      setError("No hay sesión activa");
      setLoading(false);
      return;
    }

    const headers = { Authorization: `Bearer ${token}` };

    // Construcción de la URL según el tipo de consulta
    let url = "";

    if (tipo === "dia") {
      url = `http://127.0.0.1:8000/api/estadistica/dias/${fecha}`;
    } else if (tipo === "semana" && fecha) {
      url = `http://127.0.0.1:8000/api/estadistica/semana/semana/?fecha=${fecha}`;
    } else if (tipo === "mes" && mes && anio) {
      url = `http://127.0.0.1:8000/api/estadistica/mes/mes/?mes=${mes}&anio=${anio}`;
    } else {
      setError("Debe ingresar los datos requeridos");
      setLoading(false);
      return;
    }

    try {
      const response = await axios.get(url, { headers });
      setEstadistica(response.data);
    } catch (err) {
      setError("Error al obtener estadísticas");
      console.error(err);
    }

    setLoading(false);
  };

  return (
    <div>
      <NavBar />
      <div className="container-estadistica">
        <h1>ESTADÍSTICAS FILTRADAS</h1>
        <div className="opciones">
          <label>
            Tipo:
            <select value={tipo} onChange={(e) => setTipo(e.target.value)}>
              <option value="dia">Día</option>
              <option value="semana">Semana</option>
              <option value="mes">Mes</option>
            </select>
          </label>

          {/* Opción para Semana */}
          {tipo === "semana" && (
            <label>
              Fecha (AAAA-MM-DD):
              <input
                type="date"
                value={fecha}
                onChange={(e) => setFecha(e.target.value)}
              />
            </label>
          )}

          {/* Opción para Mes */}
          {tipo === "mes" && (
            <>
              <label>
                Mes:
                <input
                  type="number"
                  min="1"
                  max="12"
                  value={mes}
                  onChange={(e) => setMes(e.target.value)}
                />
              </label>
              <label>
                Año:
                <input
                  type="number"
                  min="2000"
                  max="2100"
                  value={anio}
                  onChange={(e) => setAnio(e.target.value)}
                />
              </label>
            </>
          )}

          {/* Botón de consulta */}
          <button className="button" onClick={fetchEstadisticas}>
            Consultar
          </button>
        </div>

        {/* Mensajes de carga y error */}
        {loading && <p>Cargando...</p>}
        {error && <p className="error">{error}</p>}

        {/* Resultados */}
        {estadistica && (
          <div className="estadistica-box">
            <h3>Resultados</h3>
            <pre>{JSON.stringify(estadistica, null, 2)}</pre>
          </div>
        )}
      </div>
    </div>
  );
};

export default Estadisticas;
