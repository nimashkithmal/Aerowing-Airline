# Aerowing Airlines - Airline Reservation System

![Aerowing Airlines Homepage](./Screenshot%202025-10-14%20at%2001.25.42.png)

## Overview

**Aerowing Airlines** is a comprehensive web-based airline reservation and management system that provides a complete travel booking platform. The system enables users to book flights, reserve hotels, and manage their travel itineraries through an intuitive and modern web interface.

## Features

### ✈️ Flight Management
- Flight booking and reservation system
- Flight schedule management
- Real-time flight search and filtering
- Departure and arrival airport selection
- Date-based flight scheduling

### 🏨 Hotel Booking
- Hotel reservation system
- Check-in/check-out date management
- Guest capacity tracking
- Hotel partnership management

### 👤 User Authentication
- Secure user registration and login
- Password hashing for enhanced security
- Session management
- User profile management

### 🔧 Administrative Features
- Complete CRUD operations for flights
- User management system
- Feedback collection and management
- Customer support ticket system

## Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Server**: Apache (XAMPP)
- **Architecture**: LAMP Stack

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/swamithasara/freshly-project2.git
   ```

2. **Setup XAMPP**
   - Install XAMPP on your system
   - Start Apache and MySQL services

3. **Database Setup**
   - Import the database schema from `config/airline-2.sql`
   - Update database connection settings in `config/connection.php`

4. **File Placement**
   - Place the project files in your XAMPP `htdocs` directory
   - Navigate to `http://localhost/Airline` in your browser

## Project Structure

```
Airline/
├── assets/
│   ├── css/           # Stylesheets
│   ├── images/        # Images and logos
│   └── js/           # JavaScript files
├── auth/             # Authentication modules
├── config/           # Database configuration
├── flights/          # Flight management
├── hotel/            # Hotel booking system
├── feedback/         # Feedback system
├── support/          # Customer support
├── pages/            # Static pages
└── index.php         # Main entry point
```

## Database Schema

The system uses MySQL with the following main tables:
- `Users` - User accounts and profiles
- `Flights` - Flight information and schedules
- `SupportRequests` - Customer support tickets
- `crud` - Feedback and ratings system

## Usage

### For Users
1. Navigate to the homepage
2. Use the booking widget to search for flights
3. Register/login to access booking features
4. Manage reservations through your account

### For Administrators
1. Access admin panels for flight and hotel management
2. View and respond to customer support requests
3. Manage user accounts and feedback

## Key Features Screenshots

The homepage features:
- **Navigation Bar**: Easy access to all major functions
- **Image Carousel**: Showcasing popular destinations (France, Paris, etc.)
- **Booking Widget**: Intuitive flight search with class selection
- **Responsive Design**: Mobile-friendly interface

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is developed as part of academic coursework. All rights reserved.

## Contact

For questions or support, please contact the development team.

---



**Developed by**: Team Aerowing
