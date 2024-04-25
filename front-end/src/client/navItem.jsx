import React from 'react';
// import styles from './NavItem.module.css'; 

function NavItem({ text, path, isActive, onClick }) {
  const handleClick = () => {
    onClick(path);
  };

  const className = isActive ? 'nav-item active' : 'nav-item';

  return (
    <a href={path} className={className} onClick={handleClick}>
      {text} 
    </a>
  );
}

export default NavItem;