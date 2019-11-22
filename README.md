# laravel-test
#0 Configuration 
- Create postgres database 
- Change credential for db connection (DB_DATABASE, DB_USERNAME, DB_PASSWORD) in .env file 
- Run Command : php artisan migrate
- Run Command : php artisan db:seed
- Run Command : php artisan serve
#1 GET Method
Run URL : http://127.0.0.1:8000/user/1

#2 Post Method
You can use Postman or any other tools for test 

URL : http://127.0.0.1:8000/api/user/update

<b>Paramters</b>
- id
- comments
- password

#3 Post With Jason
URL : http://127.0.0.1:8000/api/user/update

<b>Jason Data</b> : 
{ "id":"1", "comments":"ABC", "password":"720DF6C2482218518FA20FDC52D4DED7ECC043AB" }

#4 Command
Command : php artisan user:update {id} {comments}

Example : php artisan user:update 1 XYZ
