import { StrictMode } from 'react'
import React from 'react'
import { createRoot } from 'react-dom/client'
import "./css/style.css"
import AppRouter from './routers/AppRouter.jsx'
// import ReactDOM from "react" (pendiente)
//import App from './App.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <AppRouter />
  </StrictMode>,
)
