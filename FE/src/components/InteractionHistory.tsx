import React, { useState } from "react";

interface Interaction {
  id: number;
  type: string;
  date: string;
  notes: string;
}

const InteractionHistory: React.FC = () => {
  const [interactions, setInteractions] = useState<Interaction[]>([
    { id: 1, type: "Email", date: "2024-11-01", notes: "Follow-up email sent" },
    { id: 2, type: "Call", date: "2024-11-05", notes: "Discussed project details" },
  ]);

  return (
    <div>
      <h2>Interaction History</h2>
      <ul>
        {interactions.map((interaction) => (
          <li key={interaction.id}>
            <p>Type: {interaction.type}</p>
            <p>Date: {interaction.date}</p>
            <p>Notes: {interaction.notes}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default InteractionHistory;
