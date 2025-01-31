import React, { useState, useRef, useEffect } from 'react';
import './Player.css';
import song1 from '../../assets/music/Sleepwalking_Vocal_Cover_By_Wes_Good.mp3';
import song2 from '../../assets/music/Vete_de_Kevin kaarl _ cover_versión.mp3';
import song3 from '../../assets/music/bbno$_Edamame_(feat. Connor Price)_[REMIX].mp3';

const Player = () => {
  // Estado para reproducir/pausar
  const [isPlaying, setIsPlaying] = useState(false); 
  // Estado para la barra de progreso
  const [progress, setProgress] = useState(0); 
  // Índice de la canción actual
  const [currentSongIndex, setCurrentSongIndex] = useState(0);   
  const [userInteracted, setUserInteracted] = useState(false); 
  // Referencia al elemento de audio
  const audioRef = useRef(null); 


  // Lista de canciones con sus nombres...
  const songs = [
    { name: 'Sleepwalking - Bring me the horizon -Wes Good', file: song1 },
    { name: 'Vete - Cover -  Kevin Kaarl', file: song2 },
    { name: 'Edamame Remix - Connor Price', file: song3 },
  ];

  // Función para manejar la interacción del usuario
  const handleUserInteraction = () => {
    if (!userInteracted) {
      setUserInteracted(true); 
      if (!isPlaying) {
        audioRef.current.play().then(() => setIsPlaying(true)); 
      };
    }
  };

  // Función para reproducir/pausar la música...
  
  const togglePlay = () => {
    handleUserInteraction(); 
    if (isPlaying) {
      audioRef.current.pause();
    } else {
      audioRef.current.play();
    }
    setIsPlaying(!isPlaying);
  };

  // Función para actualizar la barra de progreso

  const updateProgress = () => {
    const duration = audioRef.current.duration;
    const currentTime = audioRef.current.currentTime;
    const progressPercent = (currentTime / duration) * 100;
    setProgress(progressPercent);
  };

  // Función para cambiar de canción
  const changeSong = (index) => {
    setCurrentSongIndex(index); // Actualiza el índice de la canción actual
    setProgress(0); // Reinicia la barra de progreso

    // Cambia la fuente del audio
    audioRef.current.src = songs[index].file;

    // Intenta reproducir automáticamente. 

    if (userInteracted) {
      audioRef.current.play().then(() => setIsPlaying(true)).catch((error) => {
        console.error("Error al reproducir la canción:", error);
        setIsPlaying(false);
      });
    }
  };

  // Función para saltar a una parte específica de la canción

  const handleProgressClick = (e) => {
    handleUserInteraction(); 
    const progressBar = e.currentTarget;
    const clickPosition = e.nativeEvent.offsetX;
    const progressBarWidth = progressBar.clientWidth;
    const seekTime = (clickPosition / progressBarWidth) * audioRef.current.duration;
    audioRef.current.currentTime = seekTime;
  };

  // Reiniciar el progreso cuando la canción termina
  useEffect(() => {
    const audio = audioRef.current;
    const handleEnded = () => {
      setIsPlaying(false);
      setProgress(0);
      // Cambiar a la siguiente canción automáticamente
      const nextSongIndex = (currentSongIndex + 1) % songs.length;
      changeSong(nextSongIndex);
    };
    audio.addEventListener('ended', handleEnded);
    return () => {
      audio.removeEventListener('ended', handleEnded);
    };
  }, [currentSongIndex]);

  // Actualizar el estado de reproducción cuando el audio comienza a reproducirse
  useEffect(() => {
    const audio = audioRef.current;
    const handlePlay = () => setIsPlaying(true);
    const handlePause = () => setIsPlaying(false);

    audio.addEventListener('play', handlePlay);
    audio.addEventListener('pause', handlePause);

    return () => {
      audio.removeEventListener('play', handlePlay);
      audio.removeEventListener('pause', handlePause);
    };
  }, []);

  return (
    <div className="player">
      {/* Elemento de audio */}
      <audio
        ref={audioRef}
        src={songs[currentSongIndex].file} // Fuente de la canción actual
        onTimeUpdate={updateProgress} // Actualizar el progreso
      />

      {/* Nombre de la canción actual */}
      <div className="song-info">
        <h3>{songs[currentSongIndex].name}</h3>
      </div>

      {/* Botón de reproducción/pausa */}
      <button onClick={togglePlay} className="play-button">
        {isPlaying ? 'Pausar' : 'Reproducir'}
      </button>

      {/* Barra de progreso */}
      <div className="progress-bar" onClick={handleProgressClick}>
        <div className="progress" style={{ width: `${progress}%` }}></div>
      </div>

      {/* Botones para cambiar de canción */}
      <div className="song-controls">
        <button onClick={() => changeSong((currentSongIndex - 1 + songs.length) % songs.length)}>
          Anterior
        </button>
        <button onClick={() => changeSong((currentSongIndex + 1) % songs.length)}>
          Siguiente
        </button>
      </div>
    </div>
  );
};



export default Player;