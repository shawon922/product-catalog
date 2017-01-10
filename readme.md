# Product Catalog [Laravel 5.3]
This is a Test project develop with latest **Laravel** version **5.3+**.
## Requirements

	1. PHP >= 5.6.4
	2. OpenSSL PHP Extension
	3. PDO PHP Extension
	4. Mbstring PHP Extension
	5. Tokenizer PHP Extension
	6. XML PHP Extension


## Installation


After copying the project directory into htdocs go to this project via Terminal and run this command

```
$ composer install
```

> Noted: to run this command you have to enable internet connection

Now composer will sync all packages from server.

## Configuration

If you sure all packages was downloaded then you have to configure this project. At first create a database and put your database credentials in `.env` file. `.env` is local environment file for laravel.
After saving this configuration you have to database migrate. To migrate database run this command in your terminal

```
$ php artisan migrate
```

Now seed some data into the database using the following command:

```
$ php artisan db:seed
```

Wow you done it.

For admin:
	Email: admin@admin.com
	Password: admin12345
	
For user:
	Email: shawon922@gmail.com
	Password: 123456

Now your project is completely ready to learn.

## Run your project 

There are no special procedure to run this project. Go to terminal and run this

```
$ php artisan serve
```

Now your project run under `8000` port [http://localhost:8000](http://localhost:8000).

> Remember this: every time you have to run this server at `8000` port. Because our social login activate under this port 


After login as an admin you can access Admin area and you can add, edit, delete and view all products. You also can add and edit other users of different roles. 

After login as a Normal user you can only view the products.

