import React from "react";
import SalesReport from "../components/SalesReport";

const Sales: React.FC = () => {
  return (
    <div className="p-6 bg-gray-100 min-h-screen">
      <h1 className="text-3xl font-bold text-center text-blue-800 mb-6">Sales</h1>
      <p className="text-center text-gray-700 mb-4">Track and manage your sales and invoices here.</p>
      <div className="p-4 bg-white shadow-lg rounded-lg">
        <SalesReport />
      </div>
    </div>
  );
};

export default Sales;
