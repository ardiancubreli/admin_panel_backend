# Admin panel backend
## Features

- Basic Laravel Auth: ability to log in as administrator
- Basic Users Seeder
- Users are able to login with: username/email and password
- CRUD functionality Create / Read / Update / Delete) for two menu
items: Companies and Employees.
- Companies DB table consists of these fields: Name (required), email, logo
(minimum 100x100, website
- Employees DB table consists of these fields: First name (required), last name
(required), Company (foreign key to Companies), email, phone
- Database migrations
- Companies logos are stored in storage/app/public folder
- Basic Laravel resource controllers with default methods – index, create,
store etc.
- Laravel’s validation function, using Request classes
- Laravel’s pagination for showing Companies/Employees list, 10 entries
per page
- Laravel make:auth as default Bootstrap-based design theme, but removed
ability to register

## Installation

Clone the repo: ``` git clone https://github.com/ardiancubreli/admin_panel_backend.git ```
Run ```copy .env.example .env``` and after that update database credentials in ```.env``` file
```sh 
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
php artisan serve
```

## Login credentials

Use either email ```admin@panel.com``` or username ```admin```
Password: ```admin123```
