## Steps to install and run on your local system
$ git clone https://github.com/astudillosgroup/astudillosgroup-laravel7.git
$ cd directory
$ composer install
$ npm install
cp .env.example .env Add your database configuration in .env file (you can check my articles on how to achieve it https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/)
$ php artisan migrate 
$ php artisan db:seed ('optional' in case you want to work with test data)
$ php artisan storage:link -> create symbolic link of folder'storage' 
cp Headet.mp4  public/storage and logo.png public/storage/images
$ php artisan serve (if the server opens, http://127.0.0.1:8000, we are ready to start)