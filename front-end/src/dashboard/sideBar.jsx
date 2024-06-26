import { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';

function Sidebar() {
  const [activeLink, setActiveLink] = useState('home');

  const handleClick = (linkId) => {
    setActiveLink(linkId);
  };

  return (
    <div className="app-sidebar">
      <NavLink end to={"/dashboard"} onClick={() => handleClick('home')} className={`app-sidebar-link`}>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="feather feather-home">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
          <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
      </NavLink>
      <NavLink end to={"/dashboard/reservations"} onClick={() => handleClick('analytics')} className={`app-sidebar-link`}>
        <svg className="link-icon feather feather-pie-chart" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" viewBox="0 0 24 24">
          <defs />
          <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
        </svg>
      </NavLink>
      {/* <a href="" onClick={() => handleClick('calendar')} className={`app-sidebar-link ${activeLink === 'calendar' ? 'active' : ''}`}>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="feather feather-calendar">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
          <line x1="16" y1="2" x2="16" y2="6" />
          <line x1="8" y1="2" x2="8" y2="6" />
          <line x1="3" y1="10" x2="21" y2="10" />
        </svg>
      </a> */}
      <Link to="/login" onClick={() => handleClick('login')} className={`app-sidebar-link ${activeLink === 'login' ? 'active' : ''}`}>
        <svg className="link-icon profile-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" viewBox="0 0 24 24">
          <circle cx="12" cy="8" r="4" />
          <path d="M12 16c-3.866 0-7 3.134-7 7h14c0-3.866-3.134-7-7-7z" />
        </svg>

      </Link>
    </div>
  );
}

export default Sidebar;