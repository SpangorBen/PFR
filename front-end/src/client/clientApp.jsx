import { createContext, useEffect, useState } from "react";
import MainClient from "./mainclient";
import Sidebar from "./sidebar";
import { jwtDecode } from "jwt-decode";
import axios from "../axios";
import { Outlet, useNavigate } from "react-router-dom";
import CreateModal from "./createReservation";

export const ClientContext = createContext();

const ClientApp = () => {
  const token = sessionStorage.getItem("token");
  // const points = sessionStorage.getItem("points");
  const [points, setPoints] = useState(sessionStorage.getItem("points") || 0);
  const navigate = useNavigate();
  const [showModal, setShowModal] = useState(false);
  const [stateClient, setState] = useState({
      // services: [],
      // categories: [],
      reservations: [],
    });

  const formatDate = (dateFrom) => {
        const date = new Date(dateFrom);
        const dayOfWeek = date.toLocaleString('en-US', { weekday: 'short' });
        const month = date.toLocaleString('en-US', { month: 'short' });
        const dayOfMonth = date.toLocaleString('en-US', { day: 'numeric' });
        const time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

        return `${dayOfWeek} ${month} ${dayOfMonth} - ${time}`;
    };

  const getPoints = async () => {
    const response = await axios.get('/user/points',{
      headers:{
        Authorization: `Bearer ${token}`
      }
    });
    setPoints(()=>({
      points: response.data.data
    }))
  };

  const openModal = () => {
		setShowModal(true);
	};

	const closeModal = () => {
		setShowModal(false);
	};

  useEffect(() => {
    getPoints();
  }, []);

	return (
		<div className="client-app">
			<div className="app">
				<Sidebar/>
        <div className="main">
          <div className="main-header">
          <div className="main-header__title">Welcome dear client</div>
          <div className="main-header__avatars">
              {/* <button className="add-button"><svg fill="none" stroke="currentColor" strokeWidth="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg></button> */}
            </div>
            <h2 className="main-header__add">{points.points} Points</h2>
            {/* <button className="main-header__add">
              <svg fill="none" stroke="currentColor" strokeWidth="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>
            </button> */}
          </div>
          <ClientContext.Provider value={{ formatDate:formatDate, token:token}}>
            <Outlet/>
          </ClientContext.Provider>
          {/* <MainClient onNavItemClick={handleNavItemClick} onCardClick={handleCardClick}/> */}
        </div>
        {showModal && (<CreateModal closeModal={closeModal} />)}
      </div>
		</div>
	);
}
 
export default ClientApp;