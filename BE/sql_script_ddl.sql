-- Membuat tabel untuk menyimpan informasi kontak pelanggan
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    company VARCHAR(100),
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Membuat tabel untuk menyimpan catatan interaksi dengan pelanggan
CREATE TABLE interactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contact_id INT NOT NULL,
    type ENUM('email', 'phone', 'meeting') NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE
);

-- Membuat tabel untuk menyimpan informasi penjualan
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contact_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    invoice_number VARCHAR(50) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE
);
