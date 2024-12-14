# Contacts Application

Contacts application design that authenticates, lists, views, edits and deletes records.
DDD and SOLID principles were used in the architecture.

# 1. Installation project

## 1.1 Clone repository

To start the application installation process, you need to download the project. To do this, clone the application:
```sh
git clone https://github.com/fabriciosilvadev/contacts.git
```

## 1.2 Install dependencies

Now, it is necessary to install the dependencies through Composer:

```sh
composer install
```

## 1.3 Configure environment variables

You need to configure the file with the environment variables. To do this, create the `.env` file from a copy of the `.env.example` file:

```sh
cp .env.example .env
```

## 1.4 Update `APP_SECRET`

Run the following command to generate a new value for `APP_SECRET`:

```sh
php artisan key:generate
```

# 2. Start application

## 2.1 Start application in docker

To start the application and other dependent services, such as the database, a configuration is provided using Docker.
```
docker-compose up
```

Or to keep services running in the background:

```
docker-compose up -d
```

> Some connection variables to the database and other applications are already pre-configured. If you need to connect to another database or SMTP service, customize the connection data in `.env`.

## 2.2 Create tables and populate databases

When running the Application for the first time, it is necessary to create the database tables and populate them with initial data for testing. With the services running, run the following commands:
```sh
php artisan migrate
php artisan db:seed
```

> A user with administrator permission will be created with email `admin@alfasoft.com` and password `amazing123`.

Okay, if everything goes well we will have:

-   Application started in `http://localhost:8989`;

## 3 Run tests

To run the test suite, run the command:

```sh
composer test
