import React from "react";
import { useForm } from "react-hook-form";
import "./EditProfile.css";
import Navbar from "../../components/header/Header"

const EditProfile = () => {
    const { register, handleSubmit } = useForm();

    const onSubmit = (data) => {
        console.log("Modificando perfil de usuario:", data);
    };

    return (
        <div><Navbar/>
        <div className="container">

        

        <div className="form-container">
            <h1>MODIFICACIÓN DE USUARIO</h1>
            <form onSubmit={handleSubmit(onSubmit)}>

                <label>NOMBRE</label>
                <input type="text" {...register("NOMBRE", { required: true })} />
            
                <label>APELLIDO</label>
                <input type="text" {...register("APELLIDO",{ required: true })}/>
                <label>CORREO ELECTRONICO</label>
                <input type="email" {...register("CORREO",{ required: true })} />
                <label>FECHA DE NACIMIENTO</label>
                <input type="date" {...register("DATE",{ required: true })} />
                <button type="submit">GUARDAR</button>
            </form>

            </div>
        </div>
        </div>
    );
};

export default EditProfile;
