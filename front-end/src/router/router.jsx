import { createBrowserRouter } from "react-router-dom";
import Home from "../pages/Home";
import Login from "../pages/login";
import Signup from "../pages/signup";
import App from "../dashboard/app";
import ServiceForm from "../dashboard/createService";
import Reservations from "../dashboard/reservations";
import ProjectsSection from "../dashboard/projectSection";
import ClientApp from "../client/clientApp";
import MainClient from "../client/mainclient";
import ClientReservation from "../client/reservations";

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
                path: '',
                element: <ProjectsSection/>
            },
            {
                path: 'reservations',
                element: <Reservations/>
            },
        ]
    },
    {
        path:'/dashboard/service',
        element: <ServiceForm/>
    },
    {
        path:'/client',
        element: <ClientApp/>,
        children: [
            {
                path: '',
                element: <MainClient/>
            },
            {
                path: 'reservations',
                element: <ClientReservation/>
            },
        ]
    },

])