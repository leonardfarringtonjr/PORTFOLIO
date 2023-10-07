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

                // @csrf -> in PHP/LARAVEL, creates a hidden input field containing the CSRF token. (Cross-Site)

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
                * What sections do we turn into layouts?
                    1. Header
                    2. Service
                    3. About
                    4. Portfolio
                    5. Skills
                    6. Experience
                    7. Testimonials
                    8. Blog
                    9. Contact

                * More sections to make into layouts
                    1. Navbar
                    2. Footer
                    3. Main Content

                * @extends('frontend.layouts.layout') -> takes the code from the layout.blade.php file and applies it to the page the @extends tag is in
                * @section('content') <code> @endsection -> defines a section of code named 'content'
                * @yield('content') -> generates any code placed between the section and endsection tags

            3. Its a good idea to put each section as a layout in a 'sections' folder
    2. MASTER - FRONTEND BLOG PAGE
        1. CREATE A BLOG FILE -> BLOG.BLADE.PHP
        2. CREATE A ROUTE FOR THAT PAGE
            * AFTER YOU CREATE A PAGE, CREATE A ROUTE, THEN TEST IF THE ROUTE TAKES YOU TO THAT PAGE

    3. MASTER - FRONTEND DETAILS PAGE

D. HERO SECTION
    
    - Setup

        1. Create a controller and model specifically for handling data related to the Hero section

            * When you create a controller you must also create a model

            * You should make controllers for your admin routes

                - php artisan make:controller Controller

                - php artisan make:model

        2. Hero Page

            * YOU WANT TO CREATE A PAGE THAT HAS INPUT FIELDS THAT UPDATES THE ELEMENTS OF THE HERO SECTION
                - TITLE
                - SUB-TITLE
                - BACKGROUND IAMGE

            * WRAP ALL OF THE INPUT FIELDS INSIDE A FORM

            * MAKE THE FORM DYNAMIC

                1. ADD NAMES TO THE FORM
                2. CREATE DATABASE FIELDS IN THE MIGRATIONS FOR EACH INPUT FIELD
                    * php artisan migrate to seed the db
                3. YOU WILL USE THE UPDATE METHOD IN YOUR CONTROLLER, BECAUSE YOU'RE USING THE FORM TO UPDATE DATA
                    * AFTER YOU CREATE A FORM -> YOU CREATE A DB -> THEN YOU TEST IT TO SEE IF YOU CAN GET THE DATA
                    * ADD VALIDATION TO ENSURE THAT YOUR INPUT FIELDS ARE RECIEVING DATA WHEN THE UPDATE BUTTON IS USED
                    * ADD NOTIFICATIONS TO SEE IF THE DATA WAS SUCCESSFULLY SUBMITTED -> AND THEM TO YOUR SITE DYNAMICALLY USING AN IF/ELSE
                4. CONFIGURE YOUR FORM TO UPDATE THE IMAGE
                    1. VALIDATE DATA
                    2. STORE DATA INTO VARS
                    3. SUBMIT DATA TO THE DB
                5. 
                6. REDIRECT AFTER THE DATA IS SUBMITTED
                    // return redirect()->back();

            3. HERO PART 3
                1. GET YOUR CURRENT DATA TO SHOW IN THE INPUT FIELD DYNAMICALLY
                    * RETRIEVE THE DATA FROM THE DB USING THE find() AND STORE IT INTO A VAR
                    * WHERE YOU WANT THAT DATA SET IT AS THE VALUE FROM THAT VAR -> value="{{$hero->title}}"
                    * SET IMAGE TO REPLACE THE PREVIOUS ONE, NOT ADD TO THE UPLOAD FOLDER FOR NO REASON

            4. HERO PART 4
                1. MAKE THE ELEMENTS OF THE HERO SECTION DYNAMIC
                    * PASS DATA FROM YOUR CONTROLLER TO THE VIEW CONTAINING YOUR HERO AREA
                    * WHEN YOU UPDATE YOUR DATA KEEP YOUR CURRENT BACKGROUND IMAGE
                        1. USE A TERNARY OPERATOR TO CHECK IF THE VALUE OF THE IMAGE IS SET, IF NOT, SET IT TO THE CURRENT IMAGE IN THE DB

    - 

    1. MAKE YOUR TITLE DYNAMIC
    2. MAKE THE IMAGE DYNAMIC

E. SERVICES SECTION

F. ABOUT SECTION

    1. WHEN YOU CREATE A NEW CONTROLLER, GO AHEAD AND CREATE THE MODEL TOO
        * -r when you create a controller creates your CRUD methods for you
    2. YOU WANT TO MAKE AN EDIT PAGE THAT CONTAINS INPUT FIELDS THAT MATCH THE DATA ON THE VIEW
    3. PUT ALL OF THESE INPUT FIELDS INSIDE A FORM
    4. MAKE THE FORM DYNAMIC
        A. ADD NAMES TO THE INPUT FIELDS
        B. CREATE DB FIELDS IN THE MIGRATION FOR EACH INPUT FIELD
        C. MIGRATE THE CHANGES OVER TO YOUR DB
        D. THIS CREATES THE ROUTE YOU CAN SEND DATA TO FROM YOUR FORM, THE UPDATE METHOD OF YOUR CONTROLLER
        E. PASS THE DYNAMIC PARAMETER TO IT, YOU ARE PULLING FROM A SINGLE ID OF YOUR DB, SO YOU PUT A 1

G. PORTFOLIO SECTION

H. SKILLS SECTION

I. EXPERIENCES SECTION

J. CLIENT FEEDBACK SECTION

K. BLOG SECTION

L. CONTACT FORM

M. FOOTER SECTION

N.

Z. CHANGES FOR LATER

    1. YOUR NAME DOESN'T FIT
    2. THE PARALLAX SCROLLING IS ALITTLE BROKEN
        * I NEED TO FIND A WAY TO HAVE THE IMAGE AUTO-ADJUST TO ANY SIZE OF THE SCREEN
        * IF THE IMAGE IS TOO SMALL, IT BREAKS THE HERO IMAGE PARALLAX SCROLLING
    3. HERO IS A DROPDOWN IN THE SIDEBAR, MAKE IT A LINK
    4. THE DROPDOWNS BLINK WHEN YOU CLICK THEM IN THE SIDEBAR
    5. CHANGE COPYRIGHT AT THE BOTTOM
    6. Sec 48 - 211.
        // can use @push to use jquery
    7. Admin and Dashboard are always selected even when you're on a different page -> the tutorial doesn't have this problem
    8. Dropdown doesn't stay open and the page i'm on isn't highlighted when I am on a dropdown link

