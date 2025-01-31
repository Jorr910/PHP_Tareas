  import {BrowserRouter as Router,Routes,Route, Navigate,} from "react-router-dom";
  import NavigationBar from "../components/Header/Header";
  import App from "../App.jsx"
  import Home from "../pages/Home/Home.jsx"
  import Solicitud from "../pages/Solicitudes/Solicitud.jsx";
 
  
  // Manejo de rutas con React-Router-dom
  const AppRouter = () => {
    return (
      <Router>
        <Routes>
          <Route path="/" element={<Navigate to="/home" />} />
O          {/* Rutas de la aplicación */}
          <Route path="/header" element={<NavigationBar />} />
          <Route path="/app" element={<App />} />
          <Route path="/home" element={<Home />} />
          <Route path="/solicitud" element={<Solicitud />} />
          

        </Routes>
      </Router>
    );
  };
  
  export default AppRouter;
  