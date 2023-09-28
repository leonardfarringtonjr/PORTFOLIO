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
        - Admin -> contains all admin views
        - Auth
            - **login.blade.php** -> the default login template
        - Frontend -> contains all the frontend views
        - Layouts
            - **navigation.blade.php** -> your authentication form
        - **welcome.blade.php** -> the default Laravel homepage
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
            * All data connected to the 'user profile' page is in the 'profile' folder
            * Inside of a <form> should always be a @csrf token
            * How to put default values into input fields -> you can pull the old user from the $user var within the $request var
            * you need an error message just in-case something goes wrong whenever the user inputs data
            * You can add notifications from Toastr.js ->
            
                // https://github.com/yoeunes/toastr

                // composer require yoeunes/toastr

            * In the PROFILECONTROLLER, YOU CAN ADD A MESSAGE CUSTOMIZED BY TOASTR TO THE PROFILEUPDATEREQUEST METHOD

                // toastr()->success('Profile')

            * After creating this card to update the email, we need a card for updating the password
            * Update Profile card
            * Update Password card
            * when you submit a form w/ no data, you should always get an error
            * add update notification when you change the password
            * how to show the current admin -> get the name from the $user var, just like you do to get the default user:

                // {{old('name', $user->name)}}

        // the Route::get('/url', [Controller::class, 'method'])

C. FRONT-END
    1. MASTER - FRONTEND HOME PAGE
        * CREATE A FRONTEND FOLDER UNDER VIEWS, JUST LIKE THE ADMIN FOLDER HERE
        * CHANGE THE HOME ROUTE TO THE FRONTEND HOME PAGE
            - the Welcome view is the default Laravel page you see
            - to see the JS and CSS, you need to make them dynamic instead of static by using the asset() function
        * WHENEVER YOU INSERT PHP INTO HTML IN LARAVEL IT MUST BE INSIDE {{}}
        * Make the layout for the frontend template
            1. Create a new folder in frontend called 'layout'
            2. Create the layout.blade.php file inside
D.

