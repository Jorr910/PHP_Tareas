import React from 'react';
import { useForm } from 'react-hook-form';
import { useNavigate } from 'react-router-dom'; // Importa useNavigate para la redirección
import Footer from '../../components/Footer/Footer';
import Header from "../../components/Header/Header";
import "./Solicitud.css"

const Solicitud = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const navigate = useNavigate(); // Hook para la redirección

  // Función para manejar el envío del formulario
  const onSubmit = (data) => {
    console.log('Datos solicitados:', data); 
    localStorage.setItem('solicitud', JSON.stringify(data)); 
    alert('Solicitud enviada correctamente, volviendo al inicio'); 
    // Redirige a Home.jsx
    navigate('/'); 
  };

  return (
    <div>
    <Header />
    <div className="solicitud-container">
      <h2>Solicitud de canción</h2>
      <form onSubmit={handleSubmit(onSubmit)}>
        {/* Campo: Nombre del Artista */}
        <div className="form-group">
          <label>Nombre del Artista</label>
          <input
            type="text"
            {...register('artista', { required: 'El nombre del artista es obligatorio' })}
          />
          {errors.artista && (
            <p className="error-message">{errors.artista.message}</p>
          )}
        </div>

        {/* Campo: Nombre de la Canción */}
        <div className="form-group">
          <label>Nombre de la Canción</label>
          <input
            type="text"
            {...register('cancion', { required: 'El nombre de la canción es obligatorio' })}
          />
          {errors.cancion && (
            <p className="error-message">{errors.cancion.message}</p>
          )}
        </div>

        {/* Campo: Correo Electrónico */}
        <div className="form-group">
          <label>Correo Electrónico</label>
          <input
            type="email"
            {...register('email', {
              required: 'El correo electrónico es obligatorio',
              pattern: {
                value: /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i,
                message: 'El correo electrónico no es válido',
              },
            })}
          />
          {errors.email && (
            <p className="error-message">{errors.email.message}</p>
          )}
        </div>

        {/* Botón de Envío */}
        <div className='button-enviar'><button type="submit">Enviar Solicitud</button></div>
        
      </form>
    </div>
    <Footer />
    </div>
  );
};

export default Solicitud;