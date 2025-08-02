# Solo Respira – Cystic Fibrosis Foundation

Repository for the Solo Respira website, designed to share information about cystic fibrosis, manage events, publish research, and facilitate patient sponsorship.

---

## Table of Contents

- [Description](#description)
- [Features](#features)
  - [Unauthenticated Visitors](#unauthenticated-visitors)
  - [Authenticated Users (My Account)](#authenticated-users-my-account)
  - [Administrators](#administrators)
- [Limitations for Regular Users](#limitations-for-regular-users)
- [Technology Stack](#technology-stack)
- [Installation and Configuration](#installation-and-configuration)
- [Deployment](#deployment)
- [License](#license)

---

## Description

Solo Respira is a web portal aimed at:

- Presenting institutional and contact information.  
- Publishing events on an interactive calendar.  
- Sharing research articles on cystic fibrosis.  
- Enabling patient sponsorship.  
- Managing content and users through an admin panel.  

---

## Features

### Unauthenticated Visitors

- Browse public pages: Home, About Us, Events, Research, and Sponsorship.  
- View the event calendar powered by FullCalendar.  
- Read previews of stories and articles in dynamic carousels.  
- Access the contact section to find location details, email, and social media links.  

### Authenticated Users (My Account)

- Log in and log out securely.  
- Access a personal dashboard to view sponsorships and registered events.  

### Administrators

- Create, edit, and delete events directly on the calendar.  
- Perform full CRUD on sponsored patients, including image uploads and descriptions.  
- Publish, update, and remove research articles from the admin panel.  
- View and export messages submitted through the contact form.  
- Enforce role-based access control on both front end and back end.  

---

## Limitations for Regular Users

- Cannot create or modify content (events, sponsorships, research articles).  
- No access to the list of contact messages.  
- Cannot approve or delete files.  
- Limited to read-only views and external contact forms.  

---

## Technology Stack

- PHP 7.x  
- MySQL / MariaDB  
- Bootstrap 5  
- FullCalendar  
- Font Awesome 6  
- JavaScript (ES6)  
- Composer (PHPMailer)  

---

## Installation and Configuration

### 1. Clone the repository

```bash
git clone https://github.com/solorespira-dev/solo-respira/tree/main
cd solo-respira
```

### 2. Create the local connection file

Create the `config/connection.local.php` file (this file should be ignored by Git) and define your local MySQL credentials:

```php
<?php
$host       = 'localhost';
$user       = 'root';
$password   = '';
$database   = 'SoloRespiraDB';
```

### 3. Create the production connection file

create `config/connection.remote.php` with your hosting provider’s credentials:

```php
<?php
$host       = 'production-db-host';
$user       = 'prod_user';
$password   = 'prod_password';
$database   = 'prod_database';
```

### 4. Configure environment detection

In `config/connection.php`, detect whether you're running locally or in production, then require the appropriate file:

```php
<?php
if (in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1'])) {
  require __DIR__ . '/connection.local.php';
} else {
  require __DIR__ . '/connection.remote.php';
}

$connection = new mysqli($host, $user, $password, $database);
if ($connection->connect_error) {
  die('Connection failed: ' . $connection->connect_error);
}
```

### 5. Import the database schema

* **Locally**: import the provided `.sql` dump into your local MySQL using phpMyAdmin or the command line.
* **Remotely**: use your hosting control panel or CLI tools to import the same `.sql` dump into your production database.

### 6. Set write permissions for uploads

```bash
chmod -R 755 public/uploads/
```

---

## Deployment

* Upload everything inside the `public/` folder to your web server’s document root (e.g., `public_html`, `htdocs`).
* Make sure your server's `DocumentRoot` points to the `public/` directory.
* Verify that `config/connection.php` correctly references both `connection.local.php` and `connection.remote.php`.
* Optionally, deploy first to a staging subdomain for validation before switching DNS to production.

