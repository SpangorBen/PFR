import { useEffect, useState, createContext } from 'react';
import Header from './header';
import Sidebar from './sideBar';
// import ProjectsSection from './projectSection';
import axios from '../axios';
import ServiceForm from './createService';
import Statistics from './statistics';
import { Outlet } from 'react-router-dom';
// import MessagesSection from './MessagesSection';

export const MyContext = createContext();

function App() {
  const [isDarkMode, setIsDarkMode] = useState(false);
  const [isListView, setIsListView] = useState(false);
  const [toggle, setToggle] = useState(false);
  const token = sessionStorage.getItem('token');
  const [state, setState] = useState({
    services: [],
    categories: [],
    reservations: [],
    statistics: []
  });

  const fetchData = async () => { 
    const response = await axios.get('/services',{
      headers:{
        Authorization: `Bearer ${token}`
      }
    });
    setState((prev)=>({
      ...prev,
      services: response.data
    }))
  }

  const fetchReservations = async () => {
    const response = await axios.get('/worker/reservations',{
      headers:{
        Authorization: `Bearer ${token}`
      }
    });
    console.log(response.data);
    setState((prev)=>({
      ...prev,
      reservations: response.data.data
    }))
  }

  const fetchCategories = async () => {
    const response = await axios.get('/categories',{
      headers:{
        Authorization: `Bearer ${token}`
      }
    });
    setState((prev)=>({
      ...prev,
      categories: response.data.data
    }))
    // console.log(state.categories);
  }

  const fetchStatistics = async () => {
    const response = await axios.get('/service/statistics',{
      headers:{
        Authorization: `Bearer ${token}`
      }
    });
    console.log(response.data);
    setState((prev)=>({
      ...prev,
      statistics: response.data
    }))
  }

  const formatDate = (dateFrom) => {
        const date = new Date(dateFrom);
        const dayOfWeek = date.toLocaleString('en-US', { weekday: 'short' });
        const month = date.toLocaleString('en-US', { month: 'short' });
        const dayOfMonth = date.toLocaleString('en-US', { day: 'numeric' });
        const time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

        return `${dayOfWeek} ${month} ${dayOfMonth} - ${time}`;
    };


  const handleDarkModeToggle = () => {
    setIsDarkMode(!isDarkMode);
  };

  const handleViewToggle = (view) => {
    setIsListView(view === 'list');
  };

  const handleToggle = () => {
    setToggle(!toggle);
  };

  useEffect(() => {
    fetchData();
    fetchCategories();
    fetchReservations();
    fetchStatistics();
  },[])

  return (
    <div className={`app-container ${isDarkMode ? 'dark' : ''}`}>
      <Header
        onDarkModeToggle={handleDarkModeToggle}
        handleToggle={handleToggle}
      />
      <div className="app-content">
        <Sidebar />
        <>
          {/* <ProjectsSection isListView={isListView} services={state.services} onViewToggle={handleViewToggle} fetchData={fetchData} /> */}
          <MyContext.Provider value={{isListView:isListView, statistics:state.statistics, services:state.services, categories:state.categories, reservations:state.reservations, onViewToggle:handleViewToggle, fetchData:fetchData, formatDate:formatDate, fetchReservations:fetchReservations }}>
            <Outlet/>
          </MyContext.Provider>
          {toggle ? (
            <ServiceForm categories={state.categories} fetchData={fetchData}/>
          ) : (
            <Statistics statistics={state.statistics}/>
          )}
        </>
        {/* {showMessageSection && <MessagesSection />} Conditionally render messages section */}
      </div>
    </div>
  );
}

export default App;