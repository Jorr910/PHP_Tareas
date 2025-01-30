import React, { useEffect, useState } from "react";
import { useForm } from "react-hook-form";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import "./EditProfile.css";
import Navbar from "../../components/header/Header";

const EditProfile = () => {
    const { register, handleSubmit, setValue } = useForm();
    const navigate = useNavigate();
    const [error, setError] = useState(null);
    const [success, setSuccess] = useState(null);

    useEffect(() => {
        const storedUser = localStorage.getItem("user");
        if (storedUser) {
            const user = JSON.parse(storedUser);
            setValue("name", user.name);
            setValue("last_name", user.last_name);
        }
    }, [setValue]);

    const onSubmit = async (data) => {
        try {
            const token = localStorage.getItem("token");
            const storedUser = JSON.parse(localStorage.getItem("user"));
            if (!token || !storedUser) {
                navigate("/login");
                return;
            }
            
            const response = await axios.patch(`http://127.0.0.1:8000/api/usuarios/${storedUser.id}`, data, {
                headers: { Authorization: `Bearer ${token}` },
            });
            
            const updatedUser = { ...storedUser, ...data };
            localStorage.setItem("user", JSON.stringify(updatedUser));
            setSuccess("Perfil actualizado correctamente");
        } catch (err) {
            setError("Error al actualizar el perfil");
        }
    };

    return (
        <div>
            <Navbar />
            <div className="container">
                <div className="form-container">
                    <h1>MODIFICACIÓN DE USUARIO</h1>
                    {error && <p className="error">{error}</p>}
                    {success && <p className="success">{success}</p>}
                    <form onSubmit={handleSubmit(onSubmit)}>
                        <label>Nuevo Nombre</label>
                        <input type="text" {...register("name", { required: true })} />
                        
                        <label>Nuevo Apellido</label>
                        <input type="text" {...register("last_name", { required: true })} />
                        
                        <button type="submit">GUARDAR</button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default EditProfile;
