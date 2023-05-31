import { BrowserRouter as Router, Route, Routes, Navigate } from "react-router-dom";
import Login from "./components/views/Login";
import Register from "./components/views/Register";
import Forgot from "./components/views/Forgot";

const Auth = () => {
return (
<Router>
<Routes>
<Route path="/login" element={<Login />} />
<Route path="/register" element={<Register />} />
<Route path="/forgot-password" element={<Forgot />} />
<Route path="/*" element={<Navigate to="/login" />} />
</Routes>
</Router>
);
};

export default Auth;

