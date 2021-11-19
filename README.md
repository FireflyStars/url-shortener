<h3 align="center">Url Shortener made with <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></h3>

## About Url Shortener

This application is a basic url-shortening service. It has a basic form that consists of 1 text input
field and 1 submit button. The text input field will be used for “destination url” which will basically be the long url that will be shortened.
Below the input field, there is a simple table showing the latest created urls on the system.
The form is only accessible by logged in users, meaning the application has some sort of basic authentication for
login and registration.

## Server Requirements
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## How to run this application successfully

1. Copy .env.example and change it into .env
2. Create database(MYSQL) for this app. when you create database, please set charset as utf8 and collation as utf8_unicode_ci
3. Set database credentials in .env file
4. Add below code to the .env file. 
- SHORTEN_URL = http://url-shortener.test
3. Excute this command. 
- composer install
- php artisan migrate
- php artisan serve

## POST REST API endpoint
- api/shortened-url
- It must take "destination" field as required property of request body.
- If the "destination" field is not set or value is invalid, it will show error response with reason
## Expected json response on success:

{\
    "destination": "https://google.com",<br>
    "slug": "k9GZw",\
    "updated_at": "2021-09-10T23:52:11.000000Z",\
    "created_at": "2021-09-10T23:52:11.000000Z",\
    "id": 18,\
    "shortened_url": "http://url-shortener.test/k9GZw" <br>
}