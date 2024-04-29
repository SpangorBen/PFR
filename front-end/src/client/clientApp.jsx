import { createContext, useEffect, useState } from "react";
import MainClient from "./mainclient";
import Sidebar from "./sidebar";
import { jwtDecode } from "jwt-decode";
import axios from "../axios";
import { Outlet, useNavigate } from "react-router-dom";

export const ClientContext = createContext();

const ClientApp = () => {
  const token = sessionStorage.getItem("token");
  const points = sessionStorage.getItem("points");
  const navigate = useNavigate();
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

  const handleNavItemClick = (path) => {
    setActiveNavItem(path); 
    // ... (additional logic, e.g., filtering cards in MainClient based on activeNavItem) 
  };

  const handleCardClick = (cardId) => {
    setActiveCard(cardId === activeCard ? null : cardId);

    const cardElement = document.getElementById(`card-${cardId}`);
    if (cardElement) {
      cardElement.classList.toggle('expanded');
    }
  };

  // const getServices = async () => {
  //   const response = await axios.get('/all/services',{
  //     headers:{
  //       // Authorization: `Bearer ${token}`
  //     }
  //   });
  //   // console.log(response.data);
  //   setState((prev)=>({
  //     ...prev,
  //     services: response.data
  //   }))
  // };




  useEffect(() => {
    // getServices();
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
            <h2 className="main-header__add">{points} Points</h2>
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
      </div>
		</div>
	);
}
 
export default ClientApp;