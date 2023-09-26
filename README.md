# PORTFOLIO 2023

## Directory Structure

- App
    - Console
        - **Kernel.php**
    - Exceptions
        - **Handler.php**
    - Http
        - Controllers -> controllers handle the requests that come from routes and return views
        - Middleware -> request filter
    - Models -> responsible for communicating with your database
    - Providers
    - View
- Bootstrap
    - Cache
    - **app.php**
- Config -> handles all of your configurations / if you want to set any default system you would do so here
- Database
    - Factories
    - Migrations -> modifies your database / creating columns / deleting columns
    - Seeders
- Node Modules
- Public
    - assets
    - build
    - **.htaccess**
    - **favicon.ico**
    - **index.php** -> when your app is loaded, this is the first file your browser loads
    - **robots.txt**
- Resources
    - Views
        - Auth
            - **login.blade.php** -> the default login template
        - Layouts
            - **navigation.blade.php** -> your authentication form
- Routes
    - **auth.php** -> all of your authentication routes
    - **web.php** -> where all of your routes go
        * Every Controller must be connected to the **web.php** file
- Storage
- Tests
- Vendor -> contains all of the dependencies for Composer
- **.editorconfig**
- **.env** -> contains all environment variables
- **.env.example**
- **.gitattributes**
- **.gitignore**
- **artisan**
- **composer.json**
- **composer.lock**
- **package-lock.json**
- **package.json**
- **phpunit.xml**
- **postcss.config.js**
- **README.md**
- **tailwind.config.js**
- **vite.config.js**

****

## PROJECT NOTES

0. UNDERSTANDING LARAVEL
    - return view('folder.file')
    - all views in Laravel follow the .blade.php format

    * comments in laravel = {{-- --}}

    . LARAVEL AUTHENTICATION
        * ALL CONTAINED WITHIN THE AUTH FOLDER IN VIEWS

1. SETUP
    - ?
    - CONNECT TO GITHUB
2. ADMIN PANEL (THIS ENTIRE SECTION IS ABOUT FINDING WHAT FILES STORE WHAT DATA AND CHANGING THEM SO THAT THE TEMPLATE MATCHES WHAT ALREADY EXISTS IN LARAVEL)
    1. Mastering the Admin Dashboard Page
        * Create an admin folder inside of views where all of your admin views will go
        * ?
    2. Mastering the Admin Login Page
    3. Mastering the Forget Password Page -> Section 44
        1. SET UP MAIL SERVER
        2. TO CREATE THE FORGOT PASS PAGE, YOU CAN JUST COPY THE LOGIN PAGE CODE
            * WHEN YOU SEND A REQUEST TO CHANGE YOUR PASS, YOU SHOULD GET A NOTIFICATION
                * USE AN IF/ELSE FOR CONDITIONAL RENDERING
        3. WHEN YOU USE THE RESET PASS LINK, IT SHOULD REDIRECT TO YOUR RESET-PASSWORD VIEW
            * INSTEAD OF USING value={{'old.email'}}, you can pull the previous password from the request variable -> $request->email -> THIS PUTS THE OLD PASSWORD INTO THE INPUT FIELD WHEN YOU WANT TO RESET YOUR PASSWORD
            * THE EXACT SAME WAY YOU CAN PULL THE TOKEN FROM THE REQUEST VARIABLE
            * WHENEVER YOU CHANGE SOMETHING IN THE DB, YOU NEED A NOTIFICATION OF WHAT IS HAPPENING. WHAT IS SUCCESSFUL? OR NOT?
            * the store() method is responsible for saving your data
            * you can grab the status var from the PASSWORD_RESET method -> 'status', __($status)
        4. You have to change all of these at the same time:
            1. Login
            2. Forget Pass
            3. Reset Pass
            4. Mail Server
        5. The password input field is not hidden
        6. You should also get an email saying your password was changed
    4. Mastering the Profile Edit page

        1.
            * WHENEVER YOU CREATE A NEW VIEW IN LARAVEL YOU NEED TO RETURN IT AS A VIEW
            * WHEN YOU MOVE A CONTROLLER, REMEMBER TO CHANGE THE NAMESPACE
            * ctrl + space over a class will bring up possible auto-imports for it to work
        2. Trim the fields you dont need
        3. Make the fields dynamic

        // the Route::get('/url', [Controller::class, 'method'])

3.

