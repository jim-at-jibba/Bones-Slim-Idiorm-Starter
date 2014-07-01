Bones Slim Idiorm Starter
=========================

Bones is a Slim/Idiorm/Twig/Foundation 5 Starter Boilerplate. This application uses the slim-skeleton repo, Idiorm ORM, twig templating engine and Foundation 5 as the front-end framework.
It also includes bower and gulp files making it quick and easy get get going.

# Installation

## Install Composer

If you have not installed Composer, do that now.

<http://getcomposer.org/doc/00-intro.md#installation>

## Install Bower

If you have not installed Bower, do that now.

<http://bower.io/>

## Install Node & NPM

If you have not installed Node, do that now.

<http://nodejs.org/download/>

# Slim Framework Skeleton Application


## Install the Application

After you install Composer, run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project slim/slim-skeleton [my-app-name]

Replace <code>[my-app-name]</code> with the desired directory name for your new application. You'll want to:
* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` and `templates/cache` are web writeable.

Next, you want to run the bower install command from within your project root. This will install the bower dependencies like jquery and Foundation 5

    bower install

Finally install the gulp dependencies, run the gulp command and you are good to go.

    npm install
    gulp

## Note

This is only a starting point and is here to get you off the ground quickly. Copy this repo, pull it apart and create awesome things.


