import React, { useState } from "react";
import { useForm } from "react-hook-form";
import axios from "axios";
import "./Register.css";
import { Navigate, Link } from "react-router-dom";

const Register = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
    reset,
  } = useForm();

  // Para mostrar los mensajes mensajes.

  const [message, setMessage] = useState("");

  // Mandamos los datos con axios

  const onSubmit = async (data) => {
    try {
      const response = await axios.post("http://127.0.0.1:8000/api/register", {
        name: data.name,
        last_name: data.last_name,
        email: data.email,
        password: data.password,
      });

      setMessage("Registro exitoso. Ahora puedes iniciar sesión.");

      // Limpiamos el formulario

      reset();

      // En caso de error
    } catch (error) {
      setMessage("Error al registrarse. Inténtalo de nuevo.");
    }
  };

  // Container

  return (
    <div className="container">
      <div className="form-container">
        <h1>Regístrate</h1>
        <form onSubmit={handleSubmit(onSubmit)}>
          <label>Nombre</label>
          <input
            type="text"
            {...register("name", { required: "El nombre es obligatorio" })}
          />
          {errors.name && <p className="error">{errors.name.message}</p>}

          <label>Apellido</label>
          <input
            type="text"
            {...register("last_name", {
              required: "El apellido es obligatorio",
            })}
          />

          {errors.last_name && (
            <p className="error">{errors.last_name.message}</p>
          )}

          <label>Correo Electrónico</label>
          <input
            type="email"
            {...register("email", {
              required: "El correo es obligatorio",

              // Validación datos permitidos usando pattern

              pattern: {
                value: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                message: "Formato de correo inválido",
              },
            })}
          />
          {errors.email && <p className="error">{errors.email.message}</p>}

          <label>Contraseña</label>
          <input
            type="password"
            {...register("password", {
              required: "La contraseña es obligatoria",

              // Validación del ancho de la contraseña.

              minLength: {
                value: 8,
                message: "Debe tener al menos 8 caracteres",
              },
            })}
          />

          {errors.password && (
            <p className="error">{errors.password.message}</p>
          )}

          <button type="submit">Enviar</button>
        </form>

        {message && <p className="message">{message}</p>}
      </div>
    </div>
  );
};

export default Register;
