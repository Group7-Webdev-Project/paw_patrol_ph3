## Project Overview

Phase 3 extends the Paw Patrol Website by introducing a **backend system** to support administrative functions and database-driven content. This phase focuses on server-side development using **PHP** and **MySQL**, enabling data management through an **Admin Dashboard**.

The project is developed by BSIT 3rd year students as part of the Web Development course.

---

## Phase 3 Objectives

* Integrate a backend architecture with the existing frontend
* Implement an **Admin Dashboard** for data management
* Store and retrieve data using **MySQL**
* Practice local server deployment using **XAMPP**
* Prepare the system for future dynamic features

---

## New Features in Phase 3

* Backend folder structure
* Admin dashboard (`admin.php`)
* MySQL database integration
* Local server environment using XAMPP
* phpMyAdmin for database management

---

## Technologies Used

### Frontend

* HTML
* CSS
* JavaScript

### Backend

* PHP
* MySQL

### Tools & Environment

* Visual Studio Code
* Git & GitHub
* XAMPP (Apache, MySQL)
* phpMyAdmin

---

## Updated Project Structure

```
paw-patrol/
│
├── frontend/
|   ├── index.html              # Homepage
|   ├── styles.css              # Main stylesheet
|   ├── paw-patrol.js           # Frontend interactivity
|   ├── adoptForm.html          # Adoption form page
|   ├── adoptProcess.html       # Adoption process page
|   ├── adoptionRequirements    # Adoption requirements page
|   ├── adopt.css               # Stylesheet for adoption processes
|   ├── meet-more.html/css/js   # Meet more pets page
|   ├── pet-details.html/js     # Pet details page
|   ├── petcareTips.js          # Interactivity for pet care tips
|   ├── successStories.html     # Success stories page
|   ├── pets-careDetails.json   # Pets care list
|   ├── pets-data.json          # Pets information list
|   ├── pets-event.json         # Pets event list
|   ├── pets-wishlist.json      # Pets wishlist
|   ├── images/                 # Images and icons
|   ├── fonts/                  # Fonts
│
├── backend/
│   ├── admin.php                   # Admin dashboard (backend)
│   ├── admin.css                   # Admin stylesheet
│   ├── login.php/css               # Process admin login  and stylesheet
│   ├── logout.php                  # Process admin logout
│   ├── update_adoption_status.php  # Updates adoption status
│   ├── update_volunteer_status.php # Updates volunteer status
│   └── config.php                  # Database connection
│
└── README.md                       # Phase 3 documentation
|
└── paw_patrol_db.sql               # Database for Paw Patrol
```

---

## Admin Dashboard

* **File**: `backend/admin.php`
* **Purpose**: Allows administrators to manage website-related data stored in the database
* **Access**: Runs locally via Apache (XAMPP)

> Note: Authentication and security features can be enhanced in future phases.

---

## Database Setup (Local)

### Requirements

* XAMPP installed
* Apache and MySQL services running

### Steps

1. Open **XAMPP Control Panel**
2. Start **Apache** and **MySQL**
3. Open **phpMyAdmin** (`http://localhost/phpmyadmin`)
4. Create a new database (e.g., `paw_patrol_db`)
5. Import the provided SQL file 
6. Update database credentials inside `config.php`

Example database configuration:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "paw_patrol_db";
```

---

## Running the Project (Phase 3)

1. Move the project folder into:

   ```
   xampp/htdocs/
   ```
2. Start Apache and MySQL via XAMPP
3. Open the site in browser:

   ```
   http://localhost/paw-patrol/
   ```
4. Access admin dashboard:

   ```
   http://localhost/paw-patrol/backend/admin.php
   ```

---

## Deployment Notes

* **Frontend** can still be deployed via GitHub Pages
* **Backend (PHP & MySQL)** requires a server that supports PHP (not supported by GitHub Pages)
* Phase 3 is intended for **local or PHP-enabled hosting**

---

## Team Members

Our team follows a collaborative structure with shared responsibilities.

* **Ian Lester Lesigues** – General Contributor
* **Leonard Pueblos** – General Contributor
* **Tyrone John Zapata** – General Contributor

---

## Lessons Learned (Phase 3)

* Understanding client–server architecture
* Connecting PHP to MySQL databases
* Using phpMyAdmin for database management
* Structuring backend folders properly
* Running and testing projects in a local server environment

---

## Phase 3 Timeline

| Phase   | Task                       | Date           |
| :------ | :------------------------- | :------------- |
| Phase 3 | Backend planning           | Dec 6, 2025    |
| Phase 3 | PHP & MySQL integration    | Dec 7–10, 2025 |
| Phase 3 | Admin dashboard testing    | Dec 14, 2025   |
| Phase 3 | Documentation & submission | Dec 17, 2025   |

---

## Future Improvements

* Admin authentication & role management
* Input validation and security hardening
* CRUD operations expansion
* Online hosting with PHP support
* API-based backend refactor
