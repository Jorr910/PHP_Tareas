import React, { useEffect, useState } from "react";
import { useForm } from "react-hook-form";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import "./EditProfile.css";
import Navbar from "../../components/header/Header";

const EditProfile = () => {
    // manejo del formulario
    const { register, handleSubmit, setValue } = useForm();
    // navegación
    const navigate = useNavigate();
    // manejo de estado. 
    const [error, setError] = useState(null);
    const [success, setSuccess] = useState(null);

    // datos del usuario desde el token de inicio de sesión.

    useEffect(() => {
        const storedUser = localStorage.getItem("user");
        if (storedUser) {
            const user = JSON.parse(storedUser);
            setValue("name", user.name);
            setValue("last_name", user.last_name);
        }
    }, [setValue]); // imprimir datos iniciales.

    const onSubmit = async (data) => {

        const confirmChanges = window.confirm("¿Estás seguro de que deseas guardar los cambios?");
        if (!confirmChanges) {
            return; // Si el usuario cancela, no se hace nada
        }

        // comprobación del inicio de sesión 

        try {
            const token = localStorage.getItem("token");
            const storedUser = JSON.parse(localStorage.getItem("user"));
            if (!token || !storedUser) {
                navigate("/login");
                return;
            }

            // Axios para la petición y cambios a realizar por el metodo PATCH
            
            const response = await axios.patch(`http://127.0.0.1:8000/api/usuarios/${storedUser.id}`, data, {
                headers: { Authorization: `Bearer ${token}` },
            });
            
            // actualizamos los datos y los almacenamos tambien en el localMENTE

            const updatedUser = { ...storedUser, ...data };
            localStorage.setItem("user", JSON.stringify(updatedUser));
            setSuccess("Perfil actualizado correctamente");

            //Que nos redirija al realizar los cambios

            setTimeout(() => {
                navigate("/profile");
            }, 1000); 

        } catch (err) {
            setError("Error al actualizar el perfil");
        }
    };

    // Boton eliminar logica 

    const DeleteAccount = async () => {

        // ALERTA DE CONFIRMACIÓN

        const confirmDelete = window.confirm("¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.");
        if (!confirmDelete) {
            return; 
        }
        // ACCIÓN A TOMAR 

        try {

            // obtenemos los datos del usuario.

            const token = localStorage.getItem("token");
            const storedUser = JSON.parse(localStorage.getItem("user")); 

            // verificación si token existe.
            if (!token || !storedUser) {
                navigate("/login");
                return;
            }

            // Axios para la petición DELETE
            await axios.delete(`http://127.0.0.1:8000/api/usuarios/${storedUser.id}`, {
                headers: { Authorization: `Bearer ${token}` },
            });

            // Eliminar los datos del usuario del localStorage
            localStorage.removeItem("user");
            localStorage.removeItem("token");

            // Redirigir al login
            navigate("/login");

        } catch (err) {
            setError("Error al eliminar la cuenta");
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
                    <div id="container-delete">
                    <button onClick={DeleteAccount} id="delete-button">
                        ELIMINAR CUENTA
                    </button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default EditProfile;
