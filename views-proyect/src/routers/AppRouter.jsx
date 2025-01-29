import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Login from "../pages/Login/Login"
import Register from "../pages/Register/Register"
import EditProfile from "../pages/EditProfile/EditProfile"
import Profile from "../pages/Profile/Profile"

// Manejo de rutas con React-Router-dom 

const AppRouter = () => {
    return (
        <Router>
            <Routes>
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
                <Route path="/editprofile" element={<EditProfile />} />
                <Route path="/profile" element={<Profile />} />
            </Routes>
        </Router>
    )
}

export default AppRouter;