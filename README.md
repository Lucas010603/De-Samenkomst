# about
De-Samenkomst is the first practice exam that I made together with two other students as a way of practicing for the final exam of my MBO school.
# installation

### software requirements:
- npm (8.19.2)
- composer (2.7.1)
- php (8.1)
- local server (for database)

To run this project in development mode you must first clone the github repo: 

`https://github.com/Lucas010603/De-Samenkomst/ `

Now you can configure your database by adding the provided database to your database server and configuring the .env

example (actual values may varry depending on your setup):
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=de_samenkomst
DB_USERNAME=root
DB_PASSWORD=
```

to install the required packages for both the front and backend you can run the following commands: 

```
#backend dependencies
composer install

#frontend dependencies
npm install
```

next up you can run the following commands to start a development server

```powershell
php artisan serve

#in a new powershell terminal:
npm run dev

```
