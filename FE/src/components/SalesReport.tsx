import React, { useState } from "react";

interface Sale {
  id: number;
  item: string;
  amount: number;
  date: string;
}

const SalesReport: React.FC = () => {
  const [sales, setSales] = useState<Sale[]>([
    { id: 1, item: "Product A", amount: 200, date: "2024-11-03" },
    { id: 2, item: "Service B", amount: 500, date: "2024-11-06" },
  ]);

  const totalSales = sales.reduce((total, sale) => total + sale.amount, 0);

  return (
    <div>
      <h2>Sales Report</h2>
      <ul>
        {sales.map((sale) => (
          <li key={sale.id}>
            <p>Item: {sale.item}</p>
            <p>Amount: ${sale.amount}</p>
            <p>Date: {sale.date}</p>
          </li>
        ))}
      </ul>
      <h3>Total Sales: ${totalSales}</h3>
    </div>
  );
};

export default SalesReport;
