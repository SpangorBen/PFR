import { useEffect, useState } from "react";
import MainClient from "./mainclient";
import Sidebar from "./sidebar";
import { jwtDecode } from "jwt-decode";
import axios from "../axios";

const ClientApp = () => {

  // const [activeMenuItem, setActiveMenuItem] = useState(null);
  // const [activeNavItem, setActiveNavItem] = useState(null);
  // const [activeCard, setActiveCard] = useState(null);
  const token = sessionStorage.getItem("token");
  const [stateClient, setState] = useState({
      services: [],
      categories: [],
    });

  const handleMenuItemClick = (path) => {
    // setActiveMenuItem(path);
    // ... (additional logic, e.g., updating MainClient based on activeMenuItem)
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

  const getServices = async () => {
    const response = await axios.get('/all/services',{
      headers:{
        // Authorization: `Bearer ${token}`
      }
    });
    // console.log(response.data);
    setState((prev)=>({
      ...prev,
      services: response.data
    }))
  };

  const getUser = () => {
    const decodedToken = jwtDecode(token);
    return decodedToken;
  };

  useEffect(() => {
    getServices();
  }, []);
    console.log(stateClient.services);

	return (
		<div className="client-app">
			<div className="app">
				<Sidebar 
				// activeMenuItem={activeMenuItem}
				// onMenuItemClick={handleMenuItemClick}
        services={stateClient.services}
        getUser={getUser}
				/>
				<MainClient 
				// activeNavItem={activeNavItem}
				onNavItemClick={handleNavItemClick}
				// activeCard={activeCard}
				onCardClick={handleCardClick}
				/>
			</div>
		</div>
	);
}
 
export default ClientApp;