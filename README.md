# KrediKing

KrediKing is a web application for managing credit card data and monthly bills. This application allows users to add, edit, and delete credit card information and related monthly bills.

## Features

- **Google Oauthentication**: Allow users to log in using their Google accounts securely.
- **Credit Card Management**: Add, edit, and delete credit card information.
- **Monthly Bill Management**: Add, edit, and delete monthly bills associated with credit cards.
- **Telegram Notifications**: Send notifications to Telegram when a new monthly bill is added.
- **DataTable**: Display monthly bill data in a readable and manageable table format.
- **Responsive Design**: User interface optimized for desktop and mobile devices.

## Technologies Used

- PHP
- MySQL
- JavaScript (jQuery, DataTables)
- Bootstrap
- Google Oauth
- Telegram Bot API

## Prerequisites

- XAMPP (for local development environment)
- Git
- GitHub Account
- Telegram id (input in C:\xampp\htdocs\KrediKing\KrediKing\update\update_data_bill.php) and Bot API Token 

## Installation

1. **Clone this repository**:
   ```bash
   git clone https://github.com/XimYoo/KrediKing-Apps.git

2. **Navigate to the project directory**:
   ```bash
   cd KrediKing-Apps

3. **Import the database**:
- Open phpMyAdmin or another MySQL database management tool.
- Create a new database named KrediKing.
- Import the krediking.sql file located in the project folder into the KrediKing database.

4. **Configure database connection**:
- Open config.php and update the database connection settings (hostname, username, password, database) according to your local environment.

5. **Start the web server**:
- Ensure your web server (e.g., Apache) and MySQL server are running using XAMPP or similar tools.

6. **Access the application**:
- Open your web browser and navigate to http://localhost/KrediKing-Apps (adjust the URL as per your server setup).



