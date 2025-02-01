import { useEffect, useState } from "react";
import { db } from "../firebaseConfig";
import { collection, onSnapshot, query, orderBy, doc, updateDoc, deleteDoc } from "firebase/firestore";
import "../css/TodoList.css"; // Importamos el archivo CSS

const TodoList = () => {
  // Recibimos las tareas de firestore
  const [tareas, setTareas] = useState([]);

  // recibimos la colecciones de tareas y las ordenamos
  useEffect(() => {
    const q = query(collection(db, "tareas"), orderBy("fecha", "desc"));
    // escuchamos los cambios en tiempo real 
    const unsubscribe = onSnapshot(q, (snapshot) => {
      // convertimos en un array con ID y DATA
      setTareas(snapshot.docs.map((doc) => ({ id: doc.id, ...doc.data() })));
    });

    return () => unsubscribe();
  }, []);

  // función para completar tareas.
  const toggleCompletado = async (id, completado) => {
    try {
      const tareaRef = doc(db, "tareas", id);
      // negamos el falso, para hacerlo verdadero.
      await updateDoc(tareaRef, { completado: !completado });

    } catch (error) {
      console.error("Error al actualizar tarea:", error);
    }
  };

  // función para eliminar
  const eliminarTarea = async (id) => {
    const confirmar = window.confirm("¿Estás seguro de eliminar esta tarea?");
    if (!confirmar) return;

    try {
      await deleteDoc(doc(db, "tareas", id));
    } catch (error) {
      console.error("Error al eliminar tarea:", error);
    }
  };

  return (
    <div className="container-list">
    <ul className="todo-list">
      {tareas.map((tarea) => (
        <li key={tarea.id} className={`todo-item ${tarea.completado ? "completado" : ""}`}>
          <span onClick={() => toggleCompletado(tarea.id, tarea.completado)} className="todo-text">
            {tarea.titulo} {tarea.completado ? "| ✅ COMPLETADO ✅ |" : "| ❌ PENDIENTE ❌ |"}
          </span>
          <button onClick={() => eliminarTarea(tarea.id)} className="delete-button">ELIMINAR</button>
        </li>
      ))}
    </ul>
    </div>
  );
};

export default TodoList;
