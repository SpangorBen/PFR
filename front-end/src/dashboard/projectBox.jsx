import { useState } from "react";
import axios from "../axios";

const ProjectBox = ({service, fetchData}) => {

  const [showMenu, setShowMenu] = useState(false);

  const toggleMenu = () => {
    setShowMenu(!showMenu);
  };

  const handleDelete = () => {
    axios.delete(`/services/${service.id}`, {
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem('token')}`
      }
    })
      .then(response => {
        console.log('Service deleted successfully');
        fetchData();
      })
      .catch(error => {
        console.error('Failed to delete service:', error);
      });
  };

  const formatDate = () => {
        const date = new Date(service.created_at);
        const dayOfWeek = date.toLocaleString('en-US', { weekday: 'short' });
        const month = date.toLocaleString('en-US', { month: 'short' });
        const dayOfMonth = date.toLocaleString('en-US', { day: 'numeric' });
        const time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

        return `${dayOfWeek} ${month} ${dayOfMonth} - ${time}`;
    };

  return (
    <div 
      className="project-box-wrapper"
    >
      <div 
        className="project-box"
        style={{ backgroundColor : '#d5deff'}}
      >
        {/* Header */}
        <div className="project-box-header"> 
          <span>{formatDate()}</span>
          <div className="more-wrapper">
              <button onClick={toggleMenu} className="myButton project-btn-more">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
                      className="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                  </svg>
              </button>
              {showMenu && (
          <div id="menu" className="menu-form absolute right-[2rem] top-[-2.5rem] mt-2 bg-white border rounded-xl shadow-md z-50">
            <button type="button" onClick={handleDelete} className="block w-full py-2 px-4 text-left hover:bg-red-600 hover:text-white rounded-md">Delete</button>
            <button id="edit-btn" className="edit-btn block w-full py-2 px-4 text-left hover:bg-blue-600 hover:text-white rounded-md">Edit</button>
          </div>
        )}
            </div>
        </div>

        {/* Content Header */}
        <div className="project-box-content-header">
          <p className="box-content-header">{service.name}</p>
          <p className="box-content-subheader">{service.description}</p>
        </div>

        {/* Progress */}
        <div className="box-progress-wrapper">
          <p className="box-progress-header">Progress</p>
          <div className="box-progress-bar">
            <span 
              className="box-progress" 
              style={{ width: `60%`, backgroundColor: '#1e1e1e' }}
            ></span>
          </div>
          <p className="box-progress-percentage">60%</p>
        </div>

        {/* Footer */}
        <div className="project-box-footer">
          <div className="participants">
            
            {/* Add button for adding participants if needed */}
          </div>
          <div className="days-left">
            {service.price} Dhs
          </div>
        </div>
      </div>
    </div>
  );
}

export default ProjectBox;