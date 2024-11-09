import React, { useState } from "react";
import { Contact } from "../types";
import { saveContact } from "../services/api";

interface ContactFormProps {
  contact?: Contact;
  onSave: () => void;
}

const ContactForm: React.FC<ContactFormProps> = ({ contact, onSave }) => {
  const [name, setName] = useState(contact ? contact.name : "");
  const [email, setEmail] = useState(contact ? contact.email : "");
  const [phone, setPhone] = useState(contact ? contact.phone : "");
  const [company, setCompany] = useState(contact ? contact.company : "");

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    const newContact: Contact = { id: contact?.id || 0, name, email, phone, company };

    await saveContact(newContact);
    onSave();
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        value={name}
        onChange={(e) => setName(e.target.value)}
        placeholder="Name"
      />
      <input
        type="email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
        placeholder="Email"
      />
      <input
        type="text"
        value={phone}
        onChange={(e) => setPhone(e.target.value)}
        placeholder="Phone"
      />
      <input
        type="text"
        value={company}
        onChange={(e) => setCompany(e.target.value)}
        placeholder="Company"
      />
      <button type="submit">{contact ? "Update" : "Save"} Contact</button>
    </form>
  );
};

export default ContactForm;
