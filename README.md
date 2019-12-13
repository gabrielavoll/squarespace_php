# Squarespace PHP Assignment

# How to Run
1. Pull down repo from Github
2. if php isn't already installed locally, install it
3. in the terminal in the root of this directory run:
```
	 php -S localhost:8000 router.php
```

# Notes
The assignment called for a creating a vanilla PHP server that created an api for two calls:
1. / => which serves up one random joke, consuming the following api
2. /jokes => which returns jokes in a JSON array, accepts the param count up to 30

Made this things as simply as I possibly could, nothing fancy in the slightest. The assignment was so simple as to barely need OOP, or even functional programming, both of which I'm super comforable living inside of.
I didnt need to but I used a smidge of JS to consume the api on the / route, so I could have a cute lil "...loading" text while it was hitting the api.

Uitlized the icanhazdadjoke.com api for my jokes. Its free and super simple, so I didnt need to save my own jokes to a json file, on the server, or a db.