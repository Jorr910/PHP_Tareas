import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";

// configuraciones obtenidas en FIREBASES

const firebaseConfig = {
    apiKey: "AIzaSyCFlhDiqSbgrIm7LCRDkToiQUiLQYdWlwk",
    authDomain: "todo-list-app-83e96.firebaseapp.com",
    projectId: "todo-list-app-83e96",
    storageBucket: "todo-list-app-83e96.firebasestorage.app",
    messagingSenderId: "951184337908",
    appId: "1:951184337908:web:517f6b50121a14901f27a1"
};

// Inicializador 

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

export { db };
