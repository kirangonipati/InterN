# InterN
Task: User Management System

Laravel framework has been used to implement the task

Steps to run:
--------------
Create .env file by running the following command
cp .env.example .env

Update the following parameters in the .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

Run the following command from the project root directory
php artisan migrate

Add admin user in the users table, with the following password, which is the bcrypt value of admin password (123456)
$2a$10$2Of.OVLknkm/Xg/wKgWOJe4tuJUCmz7TRXMqpB9NC4FE8XM4AXXIe

Run the following command to start the server
php artisan serve

Login with the admin user
