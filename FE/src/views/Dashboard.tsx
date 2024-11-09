import React from "react";
import SalesReport from "../components/SalesReport";
import CustomerSegmentation from "../components/CustomerSegmentation";

const Dashboard: React.FC = () => {
  return (
    <div className="p-6 bg-gray-100 min-h-screen">
      <h1 className="text-3xl font-bold text-center text-blue-800 mb-6">Dashboard</h1>
      <p className="text-center text-gray-700 mb-4">Welcome to the CRM Dashboard! Track key metrics and insights here.</p>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div className="p-4 bg-white shadow-lg rounded-lg">
          <SalesReport />
        </div>
        <div className="p-4 bg-white shadow-lg rounded-lg">
          <CustomerSegmentation />
        </div>
      </div>
    </div>
  );
};

export default Dashboard;
