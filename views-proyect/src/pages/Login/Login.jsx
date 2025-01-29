import React from "react";
import { useForm } from "react-hook-form";
import { Link } from "react-router-dom";
import "./Login.css";

const Login = () => {
    const { register, handleSubmit } = useForm();

    const onSubmit = (data) => {
        console.log("Login Data:", data);
    };

    return (
      <div className="container">

        <div className="form-container">
        <h1> Inicio de sesión </h1>
          <form onSubmit={handleSubmit(onSubmit)}>
            <label>Correo electronico:</label>

            <input type="email" {...register("CORREO", { required: true })} />

            <label>Contraseña:</label>

            <input
              type="password"
              {...register("password", { required: true })}
            />

            <button type="submit">Inicia sesión</button>
          </form>
          <Link to="/register">¿No tienes cuenta? Regístrate</Link>
        </div>



      </div>
    ); 
};

export default Login;
