-- Database setup script for Airline Booking System
-- Run this script in MySQL to create the required database and table

-- Create database
CREATE DATABASE IF NOT EXISTS airline;

-- Use the database
USE airline;

-- Create the hotel bookings table
CREATE TABLE IF NOT EXISTS new (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    kname VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    checkingdate DATE NOT NULL,
    chekoutdate DATE NOT NULL,
    noofguest INT NOT NULL,
    hotel VARCHAR(255) NOT NULL
);

-- Insert some sample data (optional)
INSERT INTO new (kname, Email, checkingdate, chekoutdate, noofguest, hotel) VALUES
('John Doe', 'john.doe@email.com', '2024-02-15', '2024-02-18', 2, 'Queen\'s Hotel'),
('Jane Smith', 'jane.smith@email.com', '2024-02-20', '2024-02-23', 1, 'The Golden Ridge Hotel');

-- Show the table structure
DESCRIBE new;

-- Show sample data
SELECT * FROM new;
