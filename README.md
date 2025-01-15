# Psw-manager

Psw-manager is a Laravel-based application designed to securely manage passwords. It provides users with a simple and safe way to store, retrieve, and organize their passwords.

## Features

•⁠  ⁠**Secure Password Storage**: Encrypts passwords to protect sensitive information.
•⁠  ⁠**User Authentication**: Includes login and registration functionalities.
•⁠  ⁠**Password Management**: Users can add, edit, and delete passwords easily.
•⁠  ⁠**Responsive Design**: Optimized for both desktop and mobile devices.

## Installation

Follow these steps to set up the project on your local machine:

```bash

    1.⁠ ⁠Clone the Repository:
    git clone https://github.com/FabioMasciarelli/Psw-manager.git
    cd Psw-manager
   

	2.	Install Dependencies:
Run the following commands to install PHP and Node.js dependencies:

composer install
npm install


	3.	Set Up the Environment:
	•	Copy the .env.example file to create a .env file:

cp .env.example .env


	•	Generate the application key:

php artisan key:generate


	4.	Database Configuration:
	•	Open the .env file and set your database credentials:

WINDOWS
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

MacOS
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password



	•	Run migrations to set up the database schema:

php artisan migrate


	5.	Build Assets:
Compile the frontend assets:

npm run build


	6.	Start the Development Server:
Start the application using Laravel’s built-in server:

php artisan serve

The application will be available at http://localhost:8000.

```

## Usage
	•	Register a new user account or log in with existing credentials.
	•	Add passwords: Navigate to the “Add Password” section to securely store new credentials.
	•	View and manage passwords: Use the “My Passwords” section to update or delete saved passwords.

## Contributing

Contributions are **welcome**! If you’d like to contribute:
	1.	Fork the repository.
	2.	Create a new branch for your feature or bugfix.
	3.	Submit a pull request with a clear description of your changes.



## License

This project is licensed under the **MIT License**.
