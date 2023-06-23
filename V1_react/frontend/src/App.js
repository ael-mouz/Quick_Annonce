import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
// import "bootstrap/dist/css/bootstrap.min.css";
// import RegisterForm from "./components/auth/register";
import LoginForm from "./components/auth/login";
import UserHome from "./pages/User";
import AdminHome from "./pages/Admin";
// import { useNavigate } from 'react-router-dom';
import Home from "./pages/Home";




function App() {
  // const navigate = useNavigate();
  return (
    <>
      <Router>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/user/Home" element={<UserHome />} />
          <Route path="/admin/Home" element={<AdminHome />} />
        </Routes>
      </Router> 
    </>
  );
}

export default App;
