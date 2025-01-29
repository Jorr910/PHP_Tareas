import React from "react";
import "./Profile.css";
import Navbar from "../../components/header/Header"


const Profile = () => {
    return (
        
        <div>       
        
            <Navbar/>
        
        <div className="Container">
            <h1>PERFIL DEL USUARIO</h1>
            <p>Nombre: JUANITO</p>
            <p>Apellido: ALCACHOFA</p>
            <p>Email: chicharra-nueva@gmail.com</p>
            <p>Cumpleaños: 25-enero-2025</p>
        </div>

        </div>

 
    );
};

export default Profile;
