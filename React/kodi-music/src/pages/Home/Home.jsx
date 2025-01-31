import React from 'react';
import Card from '../../components/Card/Card';
import Card2 from '../../components/Card/Card2';
import './Home.css';
import img1 from "../../assets/img/0001.webp"; import img3 from "../../assets/img/0003.webp"; import img2 from "../../assets/img/0002.webp"; import img4 from "../../assets/img/0004.webp";
import Footer from "../../components/Footer/Footer"
import NavigationBar from '../../components/Header/Header';
import Player from '../../components/Player/Player';

const Home = () => {

  // Tarjetas

  const topArtists = [
    {
      title: 'BROWN',
      image: img1,
      description: 'ROCK • 2006',
    },
    {
      title: 'HASTA EL FIN DEL MUNDO',
      image: img2,
      description: 'ROCK EN ESPAÑOL • 2021',
    },
    {
      title: 'SLEEPWALKING',
      image: img1,
      description: 'ROCK • 2006',
    },
    {
        title: 'VAMONOS A MARTE',
        image: img2,
        description: 'ROMANTICA • 2021',
      }
  ];

  const FavArtists = [
    {
      title2: 'THE NEIGBOURDHOOD',
      image2: img3,
      description2: 'ALTERNATIVO • 2006',
    },
    {
      title2: 'BRING ME THE HORIZON',
      image2: img1,
      description2: 'ROCK • 2006',
    },
    {
      title2: 'KEVIN KARLS',
      image2: img2,
      description2: 'ROCK EN ESPAÑOL • 2020',
    },
    {
        title2: 'JOJI',
        image2: img4,
        description2: 'ALTERNATIVE • 2018',
      }
  ];

  return (
    <div>    

    <NavigationBar />
    <Player />
    
    <div className="home">
      <h1>CANCIONES DESTACADAS:</h1>

      {/* GENERAMOS LAS CARTAS DESDE EL COMPONENE CARD */}
      <div className="card-container">
        {topArtists.map((artist, index) => (
          <Card
            key={index}
            title={artist.title}
            image={artist.image}
            description={artist.description}
          />
        ))}
      </div>
    </div>

    <div className='home'>

        <h1>ARTISTAS FAVORITOS</h1>

          {/* GENERAMOS LAS CARTAS2 DESDE EL COMPONENE CARD */}

        <div className="card-container">
        {FavArtists.map((artist2, index2) => (
          <Card2
            key={index2}
            title2={artist2.title2}
            image2={artist2.image2}
            description2={artist2.description2}
          />
        ))}
      </div>
   

    </div>

    <Footer />

    </div>

  );
};

export default Home;