# Movie Quotes
#### Author: [Davit Shkubuliani](https://www.linkedin.com/in/davit-shkubuliani/)

---

Movie Quotes application is a web application where you can see quotes randomly on every page refresh.
All quotes are related to a certain movie. When you are on the home page and click on a movie title, 
you will be redirected to a page where you can see all the quotes related to that particular movie.

The application also has an admin panel where you can create, read, update and delete movies and quotes. 
Also app does not have a registration page. Admin must be created with the artisan command, which can be found in the configuration section.
After you create a user, you can authenticate from the login page and use admin privileges.

The application supports two languages, Georgian and English.

#
## Table of Contents

* [Prerequisites](#prerequisites)
* [Getting Started](#getting-started)
* [Configuration](#configuration)
* [Development](#development)
* [Database Structure](#database-structure)
* [Live Deployment](#live-deployment)


#
## Prerequisites

* <img src="readme/assets/php.svg" width="35" style="position: relative; top: 5px" />&nbsp;&nbsp;*PHP@8.2 and up*
* <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" />&nbsp;&nbsp;*MYSQL@8 and up*
* <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" />&nbsp;&nbsp;*npm@6 and up*
* <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" />&nbsp;&nbsp;*composer@2.4 and up*


#

## Tech Stack
- <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 5px" />&nbsp;[Laravel@8.x](https://laravel.com/docs/8.x) - back-end framework
- <img src="readme/assets/tailwind.png" height="18" style="position: relative; top: 5px" />&nbsp;[TailwindCSS](https://tailwindcss.com/) - css framework for styles
- <img src="readme/assets/spatie.png" height="19" style="position: relative; top: 4px" />&nbsp;[Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation


#
## Getting Started
1. First of all you need to clone repository from github:
    ```sh
    git clone https://github.com/RedberryInternship/data-shkubuliani-movie-quotes.git
    ```

2. Next step requires you to run *composer install* in order to install all the dependencies.
    ```sh
    composer install
    ```

3. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
    ```sh
    npm install
    ```

    and also:
    ```sh
    npm run dev
    ```


4. Now we need to set our env file. Go to the root of your project and execute this command.
    ```sh
    cp .env.example .env
    ```


#
## Configuration

1. Modify the database configuration in your `.env` file. DB_PASSWORD is empty by default.
    >DB_CONNECTION=mysql

    >DB_HOST=127.0.0.1

    >DB_PORT=3306

    >DB_DATABASE=*****

    >DB_USERNAME=*****

    >DB_PASSWORD=*****

2. Run database migrations:
    ```shell
    php artisan migrate:fresh
    ```

3. Register an User:
    ```shell
    php artisan create:user {name} {email} {password}
    ```


#
## Development

You need to start both Laravel and Vite servers:

```shell
php artisan serve
```
 
```shell
npm run dev
```


#
## Database Structure
[*drawSQL link*](https://drawsql.app/teams/datas-team/diagrams/movie-quotes)

![](readme/assets/drawSQL-movie-quotes.png)


#
## Live Deployment

https://movie-quotes.data-shkubuliani.redberryinternship.ge/


