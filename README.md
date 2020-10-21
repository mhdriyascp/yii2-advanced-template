# yii2-advanced-template
Yii2-advanced-template is based on yii2-app-advanced created by yii2 core developers. There are several upgrades made to this template.

This template has additional features listed in the next section of this guide.
Application structure has been changed to be 'shared hosting friendly'.
Features
Signup with/without account activation
You can chose whether or not new users need to activate their account using email account activation system before they can log in. (see: common/config/params.php).
Login using email/password or username/password combo.
You can chose how users will login into system. They can log in either by using their username|password combo or email|password. (see: common/config/params.php).
Rbac tables are installed with other migrations when you run yii migrate command.
RbacController's init() action will insert 5 roles and 2 permissions in our rbac tables created by migration.
Roles can be easily assigned to users by administrators of the site (see: backend/user).
Nice example of how to use rbac in your code is given in this application. See: BackendController.
Users with editor+ roles can create articles.
Session data is stored in database out of box.
System setting are stored in config/params.php file ( changes from v2 ).
Theming is supported out of the box.
Translation is supported out of the box.
Administrators and The Creator can manage users ( changes from v2 ).
Password strength validation and strength meter.
All functionalities of default advanced template are included in this template.
Code is heavily commented out.
Installation
I am assuming that you know how to: install and use Composer, and install additional packages/drivers that may be needed for you to run everything on your system. In case you are new to all of this, you can check my guides for installing default yii2 application templates, provided by yii2 developers, on Windows 8 and Ubuntu based Linux operating systems.

Create database that you are going to use for your application (you can use phpMyAdmin or any other tool you like).

Now open up your console and cd to your web root directory, for example: cd /var/www/sites/

Run the Composer create-project command:

composer create-project nenad/yii2-advanced-template advanced

Once template is downloaded, you need to initialize it in one of two environments: development (dev) or production (prod). Change your working directory to _protected and execute php init command.

cd advanced/_protected/

php init

Type 0 for development, execute coomant, type yes to confirm, and execute again.

Now you need to tell your application to use database that you have previously created. Open up main-local.php config file in advanced/_protected/common/config/main-local.php and adjust your connection credentials.

Back to the console. It is time to run yii migrations that will create necessary tables in our database. While you are inside _protected folder execute ./yii migrate command:

./yii migrate or if you are on Windows yii migrate

Execute rbac controller init action that will populate our rbac tables with default roles and permissions:

./yii rbac/init or if you are on Windows yii rbac/init

You are done, you can start your application in your browser.

*Tip: if your application name is, for example, advanced, to see the frontend side of it you just have to visit this url in local host: localhost/advanced. To see backend side, this is enough: localhost/advanced/backend.

Note: First user that signs up will get 'The Creator' (super admin) role. This is supposed to be you. This role have all possible super powers :) . Every other user that signs up after the first one will get 'member' role. Member is just normal authenticated user.

Testing
If you want to run tests you should create additional database that will be used to store your testing data. Usually testing database will have the same structure like the production one. I am assuming that you have Codeception installed globally, and that you know how to use it. Here is how you can set up everything easily:

Let's say that you have created database called advanced. Go create the testing one called advanced_tests.

Inside your main-local.php config file change database you are going to use to advanced_tests.

Open up your console and cd to the _protected folder of your application.

Run the migrations again: ./yii migrate or if you are on Windows yii migrate

Run rbac/init again: ./yii rbac/init or if you are on Windows yii rbac/init

Now you can tell your application to use your advanced database again instead of advanced_tests. Adjust your main-local.php config file again.

Now you are ready to tell Codeception to use advanced_tests database.

Inside: _protected/tests/codeception/config/config.php file tell your db to use advanced_tests database.

Start your php server inside the root of your application: php -S localhost:8080 (if the name of your application is advanced, then root is advanced folder)

To run tests written for frontend side of your application cd to _protected/tests/codeception/frontend , run codecept build and then run your tests.

Take similar steps like in step 9 for backend and common tests.
