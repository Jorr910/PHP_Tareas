import { useState } from "react";
import { db } from "../firebaseConfig";
import { collection, addDoc, serverTimestamp } from "firebase/firestore";
import "../css/TodoForm.css"; // Importamos el archivo CSS

const TodoForm = () => {
  // guardamos el input
  const [titulo, setTitulo] = useState("");

  // verificamos que no esté vacía la tarea
  const agregarTarea = async (e) => {
    e.preventDefault();
    if (titulo.trim() === "") return;

    // agregamos los datos de las tareas
    try {
      await addDoc(collection(db, "tareas"), {
        titulo,
        completado: false,
        fecha: serverTimestamp(),
      });

      // Limpiar el input luego de agregar la tarea
      setTitulo("");
      
    } catch (error) {
      console.error("Error al agregar tarea:", error);
    }
  };

  return (
    <div className="container">
    <form onSubmit={agregarTarea} className="todo-form">
      <input
        type="text"
        value={titulo}
        onChange={(e) => setTitulo(e.target.value)}
        placeholder="Escribe una tarea..."
        className="todo-input"
      />
      <button type="submit" className="todo-button">Agregar</button>
    </form>
    </div>
  );
};

export default TodoForm;
