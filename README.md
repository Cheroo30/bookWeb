# BookWeb

BookWeb is a web application for managing books. It provides features such as adding, editing, and deleting books, as well as searching and filtering options. The project is built using BOOTSTRAP, PHP and MySQL, and it utilizes XAMPP for the local development environment.

## Features

- Add new books with details like title, author, genre, and publication date.
- Edit existing book information.
- Delete books from the collection.
- Search and filter books based on various criteria.

## Installation

To run BookWeb locally, follow these steps:

### Prerequisites

- [XAMPP](https://www.apachefriends.org/download.html) (which includes Apache, MySQL, and PHP)

### Setting Up the Project

1. **Download XAMPP**: 
   - Download and install XAMPP from the official [website](https://www.apachefriends.org/download.html).

2. **Clone the Repository**:
   ```bash
   git clone https://github.com/Cheroo30/bookWeb.git
   cd bookWeb
   ```

3. **Move the Project to XAMPP's htdocs Directory:**: 
   - Copy or move the cloned project directory into the htdocs directory of your XAMPP installation. This directory is usually located at C:\xampp\htdocs on Windows.

4. **Create the Database**: 
   - Open phpMyAdmin in your web browser.
   - Create a new database named db-library.
   - Import the SQL file (db-library.sql) located in the project's root directory into the newly created database.
    
5. **Configure Database Connection:**: 
   - Set your database credentials (usually localhost, root for user, and an empty password if default settings are used).
     
6. **Start Apache and MySQL:**: 
   - Open the XAMPP control panel and start both Apache and MySQL.

### Running the Application

Open your web browser and navigate to http://localhost/bookWeb to access the application.

### License

This project is licensed under the [MIT License](LICENSE).
