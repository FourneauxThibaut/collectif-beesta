<p align="center">
  <a href="https://github.com/FourneauxThibaut/MountKuma-Framework">
    <img src="./assets/images/ourson.svg" alt="Logo" width=72 height=72>
  </a>

  <h2 align="center">MountKuma-Framework</h2>

This is my personnal mini framework.

it will help me to create new projects from a starting point.

and it help me to learn how php frameworks work.

## Quick start

- First clone the repository:
```bash 
clone https://github.com/FourneauxThibaut/MountKuma-Framework
```

- Then install the dependencies:
```bash
composer install
```

- create the database locally, and create a file named 'Config.php' in the `Config` folder. don't forget to fill the database name, username and password.

You'r done !

## Status

- [x] Basic router
- [x] Dynamic url filled with id
- [x] Middleware access
- [x] Authentication system
- [x] Reset password with Token
- [ ] Template system
- [ ] Migration system (auto creation of tables if it doesn't exist)
- [ ] Security tests
- [ ] Documentations
- [ ] Web Design
- [ ] Front end (css, js)

major problems:
- autoloader sometime don't work for any reason
- template system never worked
- bug found on {id} route -> example:
```php
  $router->get('/user/{id}', 'UserController@show');
  # if the url == /user instead of /user/1, if will send error
```

## Folder Structure

```php
├── app/                         
│    ├── Controller/            # Controllers 
│    ├── Database/              # Database Instance
│    ├── Model/                 # Models
│    └── View/                  # Views
│
├── assets/                   
│    ├── css/               
│    ├── fonts/             
│    ├── images/             
│    ├── js/                
│    └── storage/                     
│
├── Config/                  
│    └── Config.php             # You need to create this file to get started
│
├── src/                        # Folder with the logic extern of the Model logic
│    ├── Router/                # Router generated from the web.php file
│    │      ├── Route.php        
│    │      ├── Router.php         
│    │      └── web.php         # The file that contains the routes
│    │      
│    └── Utility/               # Parent class
│           ├── Controller.php         
│           └── Model.php       
│
├── .gitignore 
├── .htaccess
├── composer.json
├── composer.lock
├── index.php                   # Main file
└── README.md                             
```
## Copyright and license

The project isn't open source, but you can use it as you want.
i will write it, or find one in my minds later but it's going to be free unless you are a big company.
