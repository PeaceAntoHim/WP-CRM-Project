import axios from "axios";
import { Contact } from "../types";

const api = axios.create({
  baseURL: "http://localhost:8000/api",
});

export const getContacts = async (): Promise<Contact[]> => {
  const response = await api.get("/contacts");
  return response.data;
};

export const saveContact = async (contact: Contact): Promise<Contact> => {
  const response = await api.post("/contacts", contact);
  return response.data;
};
