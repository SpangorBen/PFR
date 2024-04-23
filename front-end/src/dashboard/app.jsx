import { useEffect, useState } from 'react';
import Header from './header';
import Sidebar from './sideBar';
import ProjectsSection from './projectSection';
import axios from '../axios';
import ServiceForm from './createService';
import Statistics from './statistics';
// import MessagesSection from './MessagesSection';

function App() {
  const [isDarkMode, setIsDarkMode] = useState(false);
  const [isListView, setIsListView] = useState(false);
  const [toggle, setToggle] = useState(false);
  const token = sessionStorage.getItem('token');
  const [state, setState] = useState({
    services: [],
    categories: []
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
    console.log(state.categories);
  }

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
  },[])
  return (
    <div className={`app-container ${isDarkMode ? 'dark' : ''}`}> {/* Conditionally apply dark mode class */}
      <Header
        onDarkModeToggle={handleDarkModeToggle} 
        handleToggle={handleToggle} 
      />
      <div className="app-content">
        <Sidebar />
        <>
          <ProjectsSection isListView={isListView} services={state.services} onViewToggle={handleViewToggle} fetchData={fetchData} />
          {toggle ? (
            <ServiceForm categories={state.categories} fetchData={fetchData}/>
          ) : (
            <Statistics />
          )}
        </>
        {/* {showMessageSection && <MessagesSection />} Conditionally render messages section */}
      </div>
    </div>
  );
}

export default App;