import React, { useEffect, useState } from 'react';
import { Contact } from '../types';
import { getContacts } from '../services/api';

const ContactList: React.FC = () => {
  const [contacts, setContacts] = useState<Contact[]>([]);

  useEffect(() => {
    const fetchContacts = async () => {
      const data = await getContacts();
      setContacts(data);
    };
    fetchContacts();
  }, []);

  return (
    <div>
      <h2>Contact List</h2>
      <ul>
        {contacts.map(contact => (
          <li key={contact.id}>
            <p>Name: {contact.name}</p>
            <p>Email: {contact.email}</p>
            <p>Phone: {contact.phone}</p>
            <p>Company: {contact.company}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default ContactList;
