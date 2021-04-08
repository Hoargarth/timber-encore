
# The Timber Starter Theme

The "_s" for Timber: a dead-simple theme that you can build from, with included Symfony Encore.

<!-- [![Build Status](https://travis-ci.org/timber/starter-theme.svg)](https://travis-ci.org/timber/starter-theme) -->

## Installing the Theme

Install this theme as you would any other, and be sure the Timber plugin is activated. But hey, let's break it down into some bullets:

1. Download the zip for this theme (or clone it) and move it to `wp-content/themes` in your WordPress installation. 
2. Rename the folder to something that makes sense for your website (generally no spaces and all lowercase). You could keep the name `timber-encore` but the point of a starter theme is to make it your own!
3. Install composer dependencies: `composer install`
4. Install Symfony Encore: `npm install` (or `yarn install` if you prefer it)
4. Activate the theme in Appearance >  Themes.
5. Do your thing! And read [the docs](https://github.com/jarednova/timber/wiki).

## How to use Symfony Encore
You can configure Encore in `webpack.config.js` file

#### Compiling assets using NPM:
- compile once: `npm run encore dev`
- recompile on file changes: `npm run encore dev --watch`
- compile for production: `npm run encore production`

#### Compiling assets using Yarn:
- compile once: `yarn encore dev`
- recompile on file changes: `yarn encore dev --watch`
- compile for production: `yarn encore production`

## What's here?

`static/` is where you can keep your static front-end scripts, styles, or images. In other words, your Sass files, JS files, fonts, and SVGs would live here.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

`bin/` and `tests/` ... basically don't worry about (or remove) these unless you know what they are and want to.

`assets` is where you can keep your asset files like JavaScript, SCSS, fonts, icons...

`dist` contains the built files by Symfony Encore, those files are then automatically enqueued in functions.php

## Other Resources

The [main Timber Wiki](https://github.com/jarednova/timber/wiki) is super great, so reference those often. Also, check out these articles and projects for more info:

* [This branch](https://github.com/laras126/timber-starter-theme/tree/tackle-box) of the starter theme has some more example code with ACF and a slightly different set up.
* [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
* [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
* [A real live Timber theme](https://github.com/laras126/yuling-theme).
* [Timber Video Tutorials](http://timber.github.io/timber/#video-tutorials) and [an incomplete set of screencasts](https://www.youtube.com/playlist?list=PLuIlodXmVQ6pkqWyR6mtQ5gQZ6BrnuFx-) for building a Timber theme from scratch.

### Original git repository
[timber/timber-starter-theme](https://github.com/timber/starter-theme/)
