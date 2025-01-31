import React from 'react';
import './Card.css';

const Card2 = ({ title2, image2, description2 }) => {
  return (
    <div className="card">
      <img src={image2} alt={title2} />
      <h3>{title2}</h3>
      <p>{description2}</p>
    </div>
  );
};

export default Card2;