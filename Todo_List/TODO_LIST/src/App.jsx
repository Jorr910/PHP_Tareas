
import { useState } from 'react'
import TodoForm from './components/TodoForm'
import TodoList from './components/TodoList'
import "./css/app.css"

function App() {


  return (
    
    <div className="p-4 max-w-md mx-auto">
      <h1 className="text-2xl font-bold mb-4">TODO LIST ✅</h1>
      <TodoForm />
      <TodoList />
    </div>
    
  )
}

export default App
