import React, { useEffect, useState } from 'react';

export default function Sports() {
  const [message, setMessage] = useState('Loading...');

  useEffect(() => {
    fetch('/api/sports')
      .then(res => res.json())
      .then(data => {
        console.log('Fetched:', data);
        setMessage('Fetched ' + data.length + ' sports.');
      })
      .catch(() => setMessage('Error fetching sports.'));
  }, []);

  return (
    <div className="container mt-4">
      <h1>Sports Page</h1>
      <p>{message}</p>
    </div>
  );
}
