import React from 'react';

function Card({ id, title, imageUrl, isActive, onClick }) {
  const handleClick = () => {
    onClick(id);
  };

  return (
    <div className={`card ${isActive ? 'expanded' : ''}`} onClick={handleClick}>
      {/* <img src={imageUrl} alt={title} /> */}
      <h3>{title}</h3>
    </div>
  );
}

export default Card;