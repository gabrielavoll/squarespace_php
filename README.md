# Squarespace PHP Assignment

### How to Run with Apache2
1. Pull down repo from Github
```
	git clone git@github.com:gato333/squarespace_php.git
```
2. Make sure php is installed on the local machine
3. Make sure apache2 is installed on the local machine, for macOS Mojave it comes preinstalled but we need to update somethings to get it up and going. In the /etc/apache2/httpd.conf uncomment this line ``` LoadModule php7_module libexec/apache2/libphp7.so ``` 
and below this line ``` #Include /private/etc/apache2/extra/httpd-vhosts.conf ``` add:
```
  Include /private/etc/apache2/vhosts/*.conf
```
Next you need to create a new directory vhosts in /etc/apache2/. Here you will need to create a _default.conf, which looks like
```
<VirtualHost *:80>
	DocumentRoot "/Library/WebServer/Documents"
</VirtualHost>
```
And for this project we will add a another file inside of vhosts, for this projects conf, in my case i called it squarespace_php.catzilla.conf:
```
<VirtualHost *:80>
    ServerAdmin YOUR_EMAIL
    DocumentRoot "PATH_WHERE_REPO_EXISTS_LOCALLY/squarespace_php/public"
    ServerName squarespace_php.catzilla 
    ServerAlias www.squarespace_php.catzilla
    ErrorLog "/private/var/log/apache2/squarespace_php.catzilla-error_log"
    CustomLog "/private/var/log/apache2/π.catzilla-access_log" common
    <Directory "PATH_WHERE_REPO_EXISTS_LOCALLY/squarespace_php/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

```
3. Now go to url `squarespace_php.catzilla:80/` in a web browers. You'll see the / route which consumes the /jokes route in play, displaying one random joke. The ServerName and ServerAlias can be switched for anything you like, it just changes the url at which you can access squarespace_php app from. 


### How to Run with simple PHP Server
1. Pull down repo from Github
2. if php isn't already installed locally, install it.
3. in the terminal in the root of this directory run:
```
	php -S localhost:8000 router.php
```
4. go to url `localhost:8000` in a web browers
	you'll see the / route which consumes the /jokes route in play, displaying one random joke


### Notes
The assignment called for a creating a vanilla PHP server that created an api for two calls:
1. / => which serves up one random joke, consuming the following api
2. /jokes => which returns jokes in a JSON array, accepts the param count up to 30

Made this things as simply as I possibly could, nothing fancy in the slightest. The assignment was so simple as to barely need OOP, or even functional programming, both of which I'm super comforable living inside of.
I didnt need to but I used a smidge of straight up JS to consume the api on the / route, so I could have a cute lil "...loading" text while it was hitting the api.

Uitlized the icanhazdadjoke.com api for my jokes. Its free and super simple, so I didnt need to save my own jokes to a json file on the server or to a db.