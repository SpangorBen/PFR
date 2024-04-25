import { createBrowserRouter } from "react-router-dom";
import Home from "../pages/Home";
import Login from "../pages/login";
import Signup from "../pages/signup";
// import Sidebar from "../dashboard/sideBar";
// import Header from "../dashboard/header";
import App from "../dashboard/app";
import ServiceForm from "../dashboard/createService";
import Reservations from "../dashboard/reservations";
import ProjectsSection from "../dashboard/projectSection";
// import Statistics from "../dashboard/statistics";
import ClientApp from "../client/clientApp";

export const router = createBrowserRouter([
    {
        path:'/',
        element: <Home/>
    },
    {
        path:'/login',
        element: <Login/>
    },
    {
        path:'/signup',
        element: <Signup/>
    },
    {
        path:'/users',
        element: <p>Hi users</p>
    },
    {
        path:'/dashboard',
        element: <App/>,
        children: [
            {
                path: '', // Default route for /dashboard
                element: <ProjectsSection/>
            },
            {
                path: 'reservations',
                element: <Reservations/>
            },
      // ... other nested routes if needed ...
        ]
    },
    {
        path:'/dashboard/service',
        element: <ServiceForm/>
    },
    {
        path:'/client',
        element: <ClientApp/>
    }

])