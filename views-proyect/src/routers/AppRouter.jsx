import {
  BrowserRouter as Router,
  Routes,
  Route,
  Navigate,
} from "react-router-dom";
import Login from "../pages/Login/Login";
import Register from "../pages/Register/Register";
import EditProfile from "../pages/EditProfile/EditProfile";
import Profile from "../pages/Profile/Profile";
import Estadisticas from "../pages/Stadistic/Estadisticas";

// Manejo de rutas con React-Router-dom
const AppRouter = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Navigate to="/login" />} />

        {/* Rutas de la aplicación */}
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/editprofile" element={<EditProfile />} />
        <Route path="/profile" element={<Profile />} />
        <Route path="/estadistica" element={<Estadisticas />} />
      </Routes>
    </Router>
  );
};

export default AppRouter;
