import { useEffect, useState } from 'react';
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [message, setMessage] = useState('');
    useEffect(() => {
    fetch('/api/DGB')
      .then((res) => res.json())
      .then((data) => setMessage(data.message));
  }, []);

  return (
    <div>
      <h1>Frontend en React de David Gómez Bravo</h1>
      <p>Esta aplicación se conecta al backend de Symfony pidiéndole una respuesta</p>
      <p>respuesta del Backend: {message || '🗿Cargando respuesta del backend🗿'}</p>
    </div>
  );
}
export default App;