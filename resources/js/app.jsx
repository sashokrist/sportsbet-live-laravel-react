import React from 'react';
import ReactDOM from 'react-dom/client';
import Sports from './Pages/Sports';

console.log("Mounted React app");

ReactDOM.createRoot(document.getElementById('app')).render(
  <React.StrictMode>
    <Sports />
  </React.StrictMode>
);