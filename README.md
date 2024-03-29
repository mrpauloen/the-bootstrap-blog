# The Bootstrap Blog

> A simple two-column WordPress theme, built with Bootstrap 4 with custom navigation, header, and type..


Summary:           | The Bootstrap Blog
-------------------|----------------
Contributors:      | [mrpauloen](https://profiles.wordpress.org/mrpauloen/)
Version:           | 0.1.4.4
Requires at least: | 5.5
Tested up to:      | 5.8
Requires PHP:  	   | 7.0
License:           | GPLv2 or later
License URI:       | http://www.gnu.org/licenses/gpl-2.0.html
Tags:              | two-columns, custom-menu, custom-background, right-sidebar, custom-header, featured-images, sticky-post, threaded-comments, translation-ready, blog

## Description

Based on the popular Bootstrap 4 library, this theme shows how mobile friendly CSS framework can be used to create sleek, simple, fast and functional websites, with ease and intuitive way in modern front-end web developmen days..


## Installation

### Manual installation:

1. Download the [`the-bootstrap-blog.zip`](https://downloads.wordpress.org/theme/the-bootstrap-blog.zip) archiwe from [WordPress repository](https://wordpress.org/themes/the-bootstrap-blog/) on the computer.
2. Unzip the archive
3. Then Upload `the-bootstrap-blog` folder to the `/wp-content/themes/` directory



### Installation using `Add New Theme`

1. From your Admin UI (Dashboard), use the menu to select `Themes > Add New`
2. Search for `The Bootstrap Blog`
3. Click the `Install` button to open the themes repository listing
4. Click the `Install` button

### Activiation and Use

1. Activate the Theme through the `Themes` menu in WordPress
2. See `Appearance > Theme Options` to change theme specific options


## License

 The Bootstrap Blog WordPress Theme, Copyright 2016-2021 Paweł Nowak

 The Bootstrap Blog is distributed under the terms of the GNU GPL


 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

 License URI: http://www.gnu.org/licenses/gpl-2.0.html

 In general words, feel free and encouraged to use, modify and redistribute this theme however you like.
 You may remove any copyright references (unless required by third party components) and crediting is not necessary.
 The theme is offered free of charge. If someone asked money for it, someone just tricked you.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

## Resources

#### The Bootstrap Blog Theme bundles the following third-party resources:

* TwentyTwenty_SVG_Icons class
  - Copyright: Twenty Twenty WordPress Theme, Copyright 2019-2021 WordPress.org
  - License: GPLv2 or later
  - License URI: http://www.gnu.org/licenses/gpl-2.0.html

* Playfair Display font
  - Copyright: 2017 The Playfair Display Project Authors (https://github.com/clauseggers/Playfair-Display)
  - Licence: SIL Open Font License (OFL)
  - Licence URI: https://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL
  - Author: Claus Eggers Sørensen Principal design
  - Author URL: http://forthehearts.net/about/


* pin.svg
  - Copyright: Entypo
  - Author URI: http://www.entypo.com/
  - Licence: CC-BY-SA 4.0
  - Licence URI: https://creativecommons.org/licenses/by-sa/4.0/


* Bootstrap v4.6.0 (https://getbootstrap.com/)
  - Copyright 2011-2021 The Bootstrap Authors
  - Copyright 2011-2021 Twitter, Inc.
  - Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)


* HTML5 Shiv v3.7.0,
  - Copyright 2014 Alexander Farkas
  - Licenses: 	MIT/GPL2
  - Source: 		https://github.com/aFarkas/html5shiv


* Respond.js v1.4.2: min/max-width media query polyfill
  - Copyright 2013 Scott Jehl
  - Licensed under MIT https://github.com/scottjehl/Respond/blob/master/LICENSE-MIT


## Theme Features

### Read Me First section

Here you can find quick links to most important sites like:
* support
* review
* author page
* components

### Widgets

Theme has only one widgets area in right sidebar

### Menu

This theme uses `wp_nav_menu()` in nine locations.

* First location: top menu has only one level depth.

* Two locations: before-widget ang aftre-widget intended to Social Menu.
 Social media links converted to icons.

* Six locations in footer as footers mega menu.
If found Social media link, social icon is added.

### Custom Excerpt Length section

By default the excerpt length is set to return 55 words. Now you can change it in Customizer by moving the slider. Available range is from 1 to 200 but you can set it precisely by input field below.

This functionality works only for posts with empty excerpt metabox (even if you used tag) and only with `the_excerpt` function, so it doesn't work for teaser when `the_content()` function is used.

Excerpt length filter is assigned to archive page as well.


## Support

If there is something you don't understand, please use the support forum:
https://wordpress.org/support/theme/the-bootstrap-blog

## Changelog

### 0.1.4.4
*Released: November 14, 2021

* Added: support JS
  - Remove the `no-js` class from body if JS is supported
* Removed: unnecessary comment_reply_link filter hook
  - fixed by new patch (51081)

### 0.1.4.3
*Released: July 24, 2021*

* Fixed small issue with Akismet hidden textarea field

### 0.1.4.1-2
*Released: December 27, 2020*

* Fixed small bugs in translations strings

### 0.1.4
*Released: December 26, 2020*

* New features added:
  - Custom footer text (with predefined tags)
  - Custom excerpt lenght (on home and archive page)
  - Mega Menu in footer (6 locations)
  - Bold and highlighted site title and description (when header image is set)
  - Bootstrap gallery filter hook
  - Hide comment Legend when login required (no need to show it if there is no comment form)
  - SVG icons
  - Two extra locations in sidebar for social menu icons
  - Starter content


### 0.1.3.1
*Released: October 3, 2020*

* No major changes, just removed one word from `single.php` and add few functions comments

### 0.1.3
*Released: October 2, 2020*

* Fixed issues mentioned in this comment ticket: https://themes.trac.wordpress.org/ticket/89549#comment:3

### 0.1.2
*Released: September 13, 2020*

* Fixed issues mentioned in this ticket: https://themes.trac.wordpress.org/ticket/49737

### 0.1
*Initial Release*
