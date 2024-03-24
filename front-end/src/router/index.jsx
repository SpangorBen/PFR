import { createBrowserRouter } from "react-router-dom";
import Home from "../pages/Home";

export const router = createBrowserRouter([
    {
        path:'/',
        element: <Home/>
    },
    {
        path:'/login',
        element: <p>Hi login</p>
    },
    {
        path:'/signup',
        element: <p>Hi signup</p>
    },
    {
        path:'/users',
        element: <p>Hi users</p>
    },
])