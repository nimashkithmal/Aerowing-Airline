# Airline Reservation System

## Project Structure

This project has been organized into a clean, modular folder structure:

```
Airline/
├── admin/                    # Admin panel files (future use)
├── assets/                   # Static assets
│   ├── css/                 # Stylesheets
│   │   └── Nav Style.css
│   ├── images/              # Images and media files
│   │   ├── Logo1.jpg
│   │   ├── search1111.jpeg
│   │   ├── user1111.jpeg
│   │   ├── SL.avif
│   │   ├── paris.avif
│   │   ├── Ausy.avif
│   │   ├── India.avif
│   │   ├── canada.avif
│   │   ├── london.avif
│   │   └── china.avif
│   └── js/                  # JavaScript files
│       └── home.js
├── auth/                     # Authentication system
│   ├── login.php
│   ├── signup.php
│   ├── display.php
│   ├── update.php
│   └── delete.php
├── config/                   # Configuration files
│   ├── connection.php
│   └── airline-2.sql
├── feedback/                 # Feedback system
│   ├── F_user.php
│   ├── F_display.php
│   ├── F_update.php
│   ├── F_delete.php
│   └── F_style.css
├── flights/                  # Flight management
│   ├── A_create.php
│   ├── A_read.php
│   ├── A_update.php
│   ├── A_delete.php
│   └── A_flight.css
├── pages/                    # Static pages
│   ├── Navigation bar.html
│   ├── aboutUs.html
│   ├── help.html
│   └── helpstyles.css
├── support/                  # Support system
│   ├── H_insert.php
│   ├── H_display.php
│   ├── H_update.php
│   ├── H_delete.php
│   ├── H_styles.css
│   └── helpupdate.css
└── index.php                 # Main entry point
```

## Features

### CRUD Operations (20 total)
- **User Management**: 5 operations (Create, Read, Update, Delete, Login)
- **Flight Management**: 4 operations (Create, Read, Update, Delete)
- **Feedback System**: 4 operations (Create, Read, Update, Delete)
- **Support Requests**: 4 operations (Create, Read, Update, Delete)

### Database Tables
- `Users` - User account management
- `Flights` - Flight information management
- `crud` - Feedback system
- `SupportRequests` - Support ticket management

## Getting Started

1. Place the project in your XAMPP htdocs folder
2. Import the database using `config/airline-2.sql`
3. Update database credentials in `config/connection.php` if needed
4. Access the application through `http://localhost/Airline/`

## File Organization Benefits

- **Modular Structure**: Each feature is in its own folder
- **Easy Maintenance**: Related files are grouped together
- **Scalable**: Easy to add new features without cluttering
- **Professional**: Follows industry best practices
- **Clear Separation**: Static assets, configuration, and business logic are separated

## Navigation

- Main page: `pages/Navigation bar.html`
- User authentication: `auth/` folder
- Flight management: `flights/` folder
- Feedback system: `feedback/` folder
- Support system: `support/` folder