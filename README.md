# InterN
Task: User Management System

Laravel framework has been used to implement the task

Steps to run:
--------------
Create .env file by running the following command<br>
cp .env.example .env

Update the following parameters in the .env file<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=<br>
DB_USERNAME=<br>
DB_PASSWORD=<br>

Make sure that the DB with name DB_DATABASE exists and the application user has write permissions for bootstrap and storage folders

Run the following command, which installs the dependencies<br>
composer install

Run the following command from the project root directory<br>
php artisan migrate

Add admin user in the users table, with the following password, which is the bcrypt value of admin password (123456)<br>
$2a$10$2Of.OVLknkm/Xg/wKgWOJe4tuJUCmz7TRXMqpB9NC4FE8XM4AXXIe

For eg:<br>
INSERT INTO users VALUES(1, "kiran", "kiran@email.com", "2019-03-30 00:00:00", "$2a$10$2Of.OVLknkm/Xg/wKgWOJe4tuJUCmz7TRXMqpB9NC4FE8XM4AXXIe", NULL, NULL, NULL)

Run the following command to generate Application key<br>
php artisan key:generate

Run the following command to start the server<br>
php artisan serve

Login with the admin user
