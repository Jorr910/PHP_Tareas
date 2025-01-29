import React from "react";
import { useForm } from "react-hook-form";
import "./Register.css";

const Register = () => {
  const { register, handleSubmit } = useForm();

  // para validación 

  const onSubmit = (data) => {
    console.log("Register Data:", data);
  };

  return (
    <div className="container">
      <div className="form-container">
        <h1>Registrate:</h1>
        <form onSubmit={handleSubmit(onSubmit)}>
          <label>NOMBRE</label>
          <input type="text" {...register("Nombre", { required: true })} />
          <label>APELLIDO</label>
          <input type="text" {...register("Apellido", { required: true })} />
          <label>CORREO ELECTRONICO</label>
          <input type="email" {...register("Correo", { required: true })} />
          <label>CONTRASEÑA</label>
          <input
            type="password"
            {...register("Password", { required: true })}
          />
      
          <button type="submit">ENVIAR</button>
        </form>
      </div>
    </div>
  );
};

export default Register;
