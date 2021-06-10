<p align="center"> <img src="https://raw.githubusercontent.com/RoachLok/MyCloudInstance/main/public/static/img/logo.png"/> </p>
<h1 align="center"> MyCloudInstance </h1>

<p align="center">A cloud computing platform for instance hosting, cloud shell's and coding resources.</p>
<p align="center">Now a Laravel project.</p>

## Usage

#### Pre-Requisites
 +  PHP version 8 (might work on version 7, but has not been tested).
 +  Composer php dependency manager.
 +  A MySQL DB service running with a copy of the project .sql. Can be on a different system.
 +  A system able to run docker for instance dispatching (Not yet needed).


#### Run the project
 +  Start cloning the repository and installing dependencies
    ```bash
    git clone https://github.com/RoachLok/MyCloudInstance
    cd MyCloudInstance
    composer install
    ```
 +  Copy .env.example file and name it .env. 
    ```bash
    cp .env.example .env
    ```
   Now edit it to include your:

 + App Settings
    ```bash
    APP_NAME=MyCloudInstace
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost:8000
    ```
 + Database Settings
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mci
    DB_USERNAME=root
    DB_PASSWORD=
    ```
 + and Email settings
    ```bash
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=some-gmail-account@gmail.com
    MAIL_PASSWORD=email_password
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS=some-gmail-account@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
    ```
 +  With your database running:
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    php artisan serve
    ```

## Main Development checkpoints

#### Done:
 +  Signup and login platform, user verification and recovery.
 +  DB for user related data storing.

#### In progress:
 +  User-friendly dashboard from where to manage instances, storage, profile, etc..
 +  C++ GNU, java and more programming environments.
 +  Easy to use and attractive interface.
 +  User location heatmap to track low population density areas (INE).

#### To Do:
 +  Virtual instances.
 +  Cloud shell.
 +  Payment gateways and payment tracking.
 +  User manuals.
 +  Ticket support system.
 +  Courses platform.
 +  Review system with sentiment analysis.
 +  Demand analysis (Youtube / StackOverflow).
 +  Service scoring.