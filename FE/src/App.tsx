import React from "react";
import { BrowserRouter as Router, Route, Routes, NavLink } from "react-router-dom";
import Dashboard from "./views/Dashboard";
import Contacts from "./views/Contacts";
import Sales from "./views/Sales";

const App: React.FC = () => {
  return (
    <Router>
      <div className="min-h-screen bg-gray-100">
        <header className="bg-blue-800 text-white p-4">
          <nav className="flex justify-center space-x-6">
            <NavLink
              to="/"
              className={({ isActive }) => `text-lg ${isActive ? "text-yellow-300" : "text-white"} hover:text-yellow-300`}>
              Dashboard
            </NavLink>
            <NavLink
              to="/contacts"
              className={({ isActive }) => `text-lg ${isActive ? "text-yellow-300" : "text-white"} hover:text-yellow-300`}>
              Contacts
            </NavLink>
            <NavLink
              to="/sales"
              className={({ isActive }) => `text-lg ${isActive ? "text-yellow-300" : "text-white"} hover:text-yellow-300`}>
              Sales
            </NavLink>
          </nav>
        </header>
        <main className="p-6">
          <Routes>
            <Route
              path="/"
              element={<Dashboard />}
            />
            <Route
              path="/contacts"
              element={<Contacts />}
            />
            <Route
              path="/sales"
              element={<Sales />}
            />
          </Routes>
        </main>
      </div>
    </Router>
  );
};

export default App;
