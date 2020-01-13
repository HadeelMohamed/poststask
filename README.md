First we need to set up project ,please follow the next

• Create folder for the project

• Then clone project in it

• Create Database change it from .env  

• Composer Update

• php artisan migrate for DB or you import Db File directly to database

• Run php artisan db:seed --class=PermissionTableSeeder "to create permissions"

• php artisan db:seed --class=CreateAdminUserSeeder"to create admin"

• Run the Project


**Admin panel Link
"http://localhost:8000/dashboard/login"

email:admin@gmail.com
password:123456**

PS:You cand edit roles and permisions from Dashboard
