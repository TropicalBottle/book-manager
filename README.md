# Get started ![badge](https://img.shields.io/endpoint?url=https://gist.githubusercontent.com/TropicalBottle/17db8e26653ba907cebc6d69088c87e1/raw/test.json)

**If you too, when asked what's your favourite book is, you forget every book you ever read. This project might be for
you!**
With this application, when asked this question, you will have access to the entirety of all the books you registered,
with the review you could have wrote for them... But that's only the start! See <a href="#roadmap">Roadmap</a>

## Stack used

- Laravel v10.x
- PHP v8.1.x
- MariaDB latest
- Node.js v18.17.1
- NPM v10.1.0

## With docker

### Requirements

- Stable version of [Docker](https://docs.docker.com/engine/install/)
- Compatible version of [Docker Compose](https://docs.docker.com/compose/install/#install-compose)
  Build or rebuild services

### Use Docker

````bash
docker compose up --build
````

Access the terminal of the php service

````bash
docker exec -ti book-manager-php-1 bash
````

Initialize the values of the database

````bash
php artisan migrate
php artisan db:seed
````

#### Laravel App
- URL: http://localhost

## Without Docker
The Laravel framework has a few system requirements. You should ensure that your web server has the following minimum PHP version and extensions:

    PHP >= 8.1
    Ctype PHP Extension
    cURL PHP Extension
    DOM PHP Extension
    Fileinfo PHP Extension
    Filter PHP Extension
    Hash PHP Extension
    Mbstring PHP Extension
    OpenSSL PHP Extension
    PCRE PHP Extension
    PDO PHP Extension
    Session PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension

To install dependencies:
````bash
composer install
````

````bash
npm install
````

**Don't forget to set the .env with your settings. You can copy the .env.example.**

Initialize the values of the database
````bash
php artisan migrate
php artisan db:seed
````

To run the laravel server & to build Tailwind automatically:
````bash
php artisan serve
npm run dev
````

# Testing
## Write test
Laravel application's use PHPUnit for testing purposes. If you want to know more about it the Laravel
documentation explain the commands: https://laravel.com/docs/10.x/testing

Otherwise, I would also recommend this video that explained everything very well (in French 🇫🇷): https://www.youtube.com/watch?v=_MJmU-wRwpI

## Execute test
To test without coverage
```bash
php artisan test
```

To test with coverage:
```bash
php artisan test --coverage
```


# Roadmap 🚩
## 1.0

The first version of this project, will make sure you can have your own library everywhere you want from the already
hosted website, or from this application you could build.
- [x] Working user system
  - [x] Authentification
  - [ ] Roles
- [ ] Library
  - [ ] Add books to library
  - [ ] Access your library
- [ ] Reviews
  - [ ] Write your reviews
  - [ ] Access your reviews
- [ ] Wishlist
    - [ ] Add books to wishlist
    - [ ] Access your wishlist

## 2.0

This version will let you join a group of users when you can share a common library. This will let you see the books your friends
added to the group, and their reviews. It's perfect for reading clubs or friend group that want to share easily books between them.
- [ ] Group
  - [ ] Create a group
  - [ ] Join a group
  - [ ] See group user library
