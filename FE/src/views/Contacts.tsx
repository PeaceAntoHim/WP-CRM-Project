import React, { useState } from 'react';
import ContactList from '../components/ContactList';
import ContactForm from '../components/ContactForm';

const Contacts: React.FC = () => {
  const [refresh, setRefresh] = useState(false);

  const handleSave = () => {
    setRefresh(!refresh);
  };

  return (
    <div className="p-6 bg-gray-100 min-h-screen">
      <h1 className="text-3xl font-bold text-center text-blue-800 mb-6">Contacts</h1>
      <div className="flex flex-col md:flex-row gap-4">
        <div className="w-full md:w-1/2 p-4 bg-white shadow-lg rounded-lg">
          <h2 className="text-xl font-semibold text-gray-800 mb-3">Add Contact</h2>
          <ContactForm onSave={handleSave} />
        </div>
        <div className="w-full md:w-1/2 p-4 bg-white shadow-lg rounded-lg">
          <h2 className="text-xl font-semibold text-gray-800 mb-3">Contact List</h2>
          <ContactList key={refresh ? 'refresh' : 'static'} />
        </div>
      </div>
    </div>
  );
};

export default Contacts;
