import React from "react";

interface Segment {
  id: number;
  name: string;
  description: string;
  customerCount: number;
}

const CustomerSegmentation: React.FC = () => {
  const segments: Segment[] = [
    { id: 1, name: "High Value", description: "Customers with high purchase frequency", customerCount: 30 },
    { id: 2, name: "New Customers", description: "Recently acquired customers", customerCount: 15 },
    { id: 3, name: "Low Engagement", description: "Customers with minimal interaction", customerCount: 20 },
  ];

  return (
    <div>
      <h2>Customer Segmentation</h2>
      <ul>
        {segments.map((segment) => (
          <li key={segment.id}>
            <p>Segment: {segment.name}</p>
            <p>Description: {segment.description}</p>
            <p>Customer Count: {segment.customerCount}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CustomerSegmentation;
