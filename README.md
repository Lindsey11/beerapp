# beerapp
This is the app of all apps to help settle your beer debates at work!


SlimApp RESTful API
This is a RESTful api built with the SlimPHP framework and uses MySQL for storage.

Version
1.0.0

Usage
Installation
Download this project file.
Import or create a database with two table to hold the information for the beers and for ratings
Install composer.
Install the slim framework: composer require slim/slim "^3.0"

Edit db/config params as follows(This gives a better work understanding of the API):
You will need to edit your PC vhosts and add: beerapp
Then edit your appache v- hosts file : httpd-vhosts.conf IE.

<VirtualHost *:80>

    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/beerapp/public"
    ServerName beerapp

</VirtualHost>

Once you have done this you can test the API endpoints using these in your URL

API Endpints
 GET: http://beerapp/beer
 GET http://beerapp/beer/id
 POST http://beerapp/beer/add
 PUT http://beerapp/beer/update/id
 DELETE http://beerapp/beer/delete/id

<h1>RUNNING THE APP</h1>
The front of the app can accessed from the views file in the projects file 
Start the project from the home.html file and have fun.
