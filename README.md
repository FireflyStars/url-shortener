<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

<h3 align="center">Url Shortener</h3>

## About Url Shortener

This application is a basic url-shortening service. It has a basic form that consists of 1 text input
field and 1 submit button. The text input field will be used for “destination url” which will basically be the long url that will be shortened.
Below the input field, there is a simple table showing the latest created urls on the system.
The form is only accessible by logged in users, meaning the application has some sort of basic authentication for
login and registration.

## How to excute this application

1. Add this code to your .env file. SHORTEN_URL = http://url-shortener.test
2. Excute this command. 
- composer install
- php artisan migrate
- php artisan serve

## POST REST API endpoint
- api/shortened-url
- it must take "destination" field as required property of request body.
## Expected json response on success:

{
"destination": "https://google.com",
"slug": "k9GZw",
"updated_at": "2021-09-10T23:52:11.000000Z",
"created_at": "2021-09-10T23:52:11.000000Z",
"id": 18,
"shortened_url": "http://url-shortener.test/k9GZw"
}