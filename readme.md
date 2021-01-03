# Wedding Booking System

I originally designed this in Excel, however now that I have knowledge of MYSQL and frameworks. I can create a proper system instead of trying to shoe horn it into Excel.

I want this project to show case what I have learnt about different packages and languages.

## Setup & Equipment

### Server / Hosting

This was created using a Digital Ocean Droplet, setup with a Laravel 7 package.

This was set up on an iPhone 11, in a barbers while I waited for my turn using Safari. Once, the droplet was created using an app called TERMIUS. This granted me CLI access to it, I used the linux terminal to update and upgrade the server.

My first issue was that I have been learning Laravel version 8, so I researched how to update to version 8.

I have also installed the ui addon pack with bootstrap as well with 'composer require laravel/ui && php artisan ui bootstrap --auth && npm install && npm run dev'

I am also using an app called Koder on my iPad to write this document.

I have now gone to my MacBook Pro, and because I haven't set this up using my usual method of Visual Code Studio. I had to relearn the CLI commands for Github, to create a git repo on the server, then commit all the changes, then push it to a repo on github. For me to then download the repo onto my computer and then set up an FTP access in Visual Studio Code, adding the file sftp.json to the gitignore. So people could not access my settings.

I have just setup remote access to MYSQL Server via MYSQL Workbench.

Hopefully this demonstrates, different ways of solving problems. Knowledge of Github and linux terminal commands as well as setting up a Laravel server, and then updating it to the latest version. Also, MYSQL creating users, granting permissions.

### Security

I have secured it using certbot.

## Technologies Used

|  Technology   | How it was used                                                 |                   Website                    |
| :-----------: | --------------------------------------------------------------- | :------------------------------------------: |
|     HTML      | Backbone of everything                                          | <https://www.w3schools.com/html/default.asp> |
|      CSS      | Styling                                                         | <https://www.w3schools.com/css/default.asp>  |
|   BOOTSTRAP   | A modern responsive front-end framework                         |          <https://getbootstrap.com>          |
|  JAVASCRIPT   | Used for some functionality on the website                      |  <https://www.w3schools.com/js/default.asp>  |
|      PHP      | Used for the server based functionality on the website          |            <https://www.php.net>             |
|     MYSQL     | Database Software                                               |       <https://www.mysqltutorial.org>        |
| Digital Ocean | Cloud Platform to Host                                          |        <https://www.digitalocean.com>        |
|    GITHUB     | Stores my work so that other people and myself can reference it |           <https://www.github.com>           |
|    VSCODE     | An IDE allowing me to code on my computer                       |       <https://code.visualstudio.com/>       |
|    PHPStorm   | An IDE allowing me to code on my computer, no experience        |     <https://www.jetbrains.com/phpstorm/>    |
|    Termius    | App that allows SSH into Server                                 |            <https://termius.com>             |
|     Koder     | App that allows SSH into Server                                 |            <https://koderapp.com>            |
|   iPhone 11   | Hardware                                                        |          <http://www.apple.com/uk/>          |
| iPad Pro 12.9 | Hardware                                                        |          <http://www.apple.com/uk/>          |
|  Macbook Pro  | Hardware                                                        |          <http://www.apple.com/uk/>          |

## Issues

### Using PHPStorm

Never before used this application, so I started to work my way around it and I set everything working.
SSH
SFTP
GIT

Problem came from when I automatically uploaded all the files to the server, overwriting the server copy of .env

Solution: - I restored my droplet as a new droplet and downloaded the env file and uploaded it to the main laravel server.

### Upgrading from Laravel 7 to 8

From the upgrade, the "Models" folder was not present.

Failed Solution: - I created another droplet, that had a LAMP server on it, I then installed Composer, Laravel, I also modified the apache2 folder for virtual hosts.  However after an hour, it wouldn't load the laravel pages just showing the folder view in the browser.

Solution: - Just after to work out the differences between what I have learnt and the older version.

### Local and Remote Migrations in SQL

It seems everytime I try to update my remote server with the remote/local migrations it doesn't update the database.

Possible Solution: - Start again fresh on a new laravel install, but only operate it remotely not have a local one and a remote one?

Solution: - I did a fresh install and not using a local and remote copy, just going to use SSH to do it remotely.

## Frontend

I have decided to add some additional information to the Home and About pages.  This will give more information to people about myself and what I can do.

## Reloading everything I have done from the old laravel

Finally grabbed everything from the old laravel to the fresh one,

had to do a 'composer dumpautoload' to fix the app\models\user issue that occurred when upgrading from 7 to 8.

also had to update auth.php

## Things to do

- Setup Users and the ability to edit there only profiles, as well as log out.
  - Create User Roles, Super (Sees everything, Owner access to income information, Manager access to Customers & Events)
  - Setup Staff Details, to record when they started working at the Hotels, this can record the two different hotels.
    - There will need to be at least six tables.
        - Users -> Allow access to the Admin Area
        - Role -> Super, Owner, Manager
        - Permissions -> Grant certain access to admin areas
        - Staff -> For Data entry about the staff details
        - Hotels -> Different Hotels different staff members
        - Position -> Roles within the company
- Setup Customers Table for brides and grooms
    - Brides Name
    - Grooms Name
    - Contact Number
    - Contact Email
    - Address 1
    - Address 2
    - Town/City
    - County
    - PostCode
    - FK User_Id to see who inputted the details.  Could be used for stats later on.
  
- Setup Wedding Events Table for 1 to Many, ie 1 Customer to many events, (just in case they want an anniversary, or renew of vows).
    - Event_ID
    - FK Customer_ID
    - Appointment Date
    - Hold Till Date
    - Contract Issued Date
    - Function Date
    - Deposit Taken Date
    - 25 Due Date
    - Final Wedding Talk
    - Final Payment Date
    - On Hold
    - Contract Returned
    - Agreement Signed
    - Deposit Taken
    - 25% Payment Taken
    - Had Final Talk
    - Cost


## Creating

### Permissions and Roles
'php artisan make:model Permission -mc' Creates a Model called Permission
'php artisan make:model Role -mc' Creates a Model called Role
'php artisan make:migration create_users_permissions_table --create=permission_user' Creates a Pivot table
'php artisan make:migration create_users_roles_table --create=role_user' Creates a Pivot table
'php artisan make:migration create_roles_permissions_table --create=permission_role' Creates a Pivot table

### Staff and Customers
'php artisan make:model Staff -mc' Creates a Model called Permission
'php artisan make:model Customer -mc' Creates a Model called Role

### Creating Roles & Permissions

'php artisan tinker'
'$user = App\Models\User::find(1)' // Finds the First User
'$admin = App\Models\Role::create(['name'=>'Example','slug'=>'example'])' // Creates a role called example
'$user->roles()->attach($admin)' // Attaches the role to the user
'$view_dashboard = App\Models\Permission::create(['name'=>'View Dashboard', 'slug'=>'view-dashboard'])' // Creates the permission
'$admin->permissions()->attach($view_dashboard)' // Attaches permission to role.

## Testing

- Created an if statement to see if Admin roles could see text
    - Passed

## Security

I have started to lock down certain things,
    - Only people who have been authorised (logged in), can get to the admin area.
    - Everyone except staff members can see the user list.

## Housekeeping

I have separated the routes over multiple files and updated the RouteServiceProvider with the new file directory.

I commented my code as I tend to code ahead and get caught up in the moment and forget to comment my code.

## Costing

Ideas on how to achieve a costing section.

Cost -> Thats the Cost of the Event
Deposit -> Set Cost
25% Payment ->
Subtotal -> Payment totals the Cost

Credit Card Details -> Done

Many to Many Relationship

Many Events to Many Transactions

Date of Payment
Type of Payment -> Deposit, 25% payment etc
