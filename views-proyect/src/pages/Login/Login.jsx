import React, { useState } from "react";
import { useForm } from "react-hook-form";
import { useNavigate, Link } from "react-router-dom";
import axios from "axios";
import "./Login.css";

const Login = () => {
  const { register, handleSubmit, formState: { errors } } = useForm();
  const [errorMessage, setErrorMessage] = useState("");
  const navigate = useNavigate();

  const onSubmit = async (data) => {
    try {
      const response = await axios.post("http://127.0.0.1:8000/api/login", {
        email: data.email,
        password: data.password,
      });
  
      console.log("Respuesta del servidor:", response.data); // 👉 Verifica qué devuelve la API
  
      localStorage.setItem("token", response.data.access_token);
      localStorage.setItem("user", JSON.stringify(response.data.user)); 
      localStorage.setItem("loginTime", Date.now());
  
      navigate("/profile");
    } catch (error) {
      console.error("Error en el login:", error.response?.data || error.message);
      setErrorMessage("Credenciales incorrectas. Inténtalo de nuevo.");
    }
  };
  
  return (
    <div className="container">
      <div className="form-container">
        <h1>Inicio de sesión</h1>
        <form onSubmit={handleSubmit(onSubmit)}>
          <label>Correo electrónico:</label>
          <input
            type="email"
            {...register("email", { required: "El correo es obligatorio" })}
          />
          {errors.email && <p className="error">{errors.email.message}</p>}

          <label>Contraseña:</label>
          <input
            type="password"
            {...register("password", { required: "La contraseña es obligatoria" })}
          />
          {errors.password && <p className="error">{errors.password.message}</p>}

          <button type="submit">Iniciar sesión</button>
        </form>

        {errorMessage && <p className="error">{errorMessage}</p>}

        <Link to="/register">¿No tienes cuenta? Regístrate</Link>
      </div>
    </div>
  );
};

export default Login;
