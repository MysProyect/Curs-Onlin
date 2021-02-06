## Steps to install and run on your local system
1. git clone https://github.com/astudillosgroup/astudillosgroup-laravel7.git
2. cd directory
3. composer install
4. npm install
5. cp .env.example .env
6. php artisan key:generate
7. Add your database configuration in .env file (you can check my articles on how to achieve it https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/)
8. php artisan migrate 
9. php artisan db:seed ('optional' in case you want to work with test data)
10. php artisan storage:link -> create symbolic link of folder'storage' 
11. php artisan serve (if the server opens, http://127.0.0.1:8000, we are ready to start)
