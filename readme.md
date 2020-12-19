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

Finally grabbed everythign from the old laravel to the fresh one,

had to do a 'composer dumpautoload' to fix the app\models\user issue that occured when upgrading from 7 to 8.

also had to update auth.php

