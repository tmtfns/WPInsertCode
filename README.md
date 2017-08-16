# WPInsertCode
Wordpress backbone plugin what help insert js css html and third-party code by shortcodes
**Tested :** 4.8

## Description

The backbone of the wordpress plugin allows you to add some code consisting of javascript code, css, html using  your shortcode [WPInsertCodeShortcode]. The plugin has the ability to edit its options, which are passed to the code. Options can be edited in admin part.

### Features

* There are two ways to upload a css file to a page, but in reality you need to select one of them. 
* The first way addes the file to every page, although you can limite the type of pages.
* The second way is more optional. It loads the css file using the code. But in this case the styles will not be applied by the browser right away. In this case, you should take care of the appearance of the outputted code and hide it by inline styles, removing them after uploading the css file using javascript callback function.

## Installation 
1. Change the plugin names.
2 Select one of two way 
3  Replace everywhere  
 WPInsertCode with your plugin class name
 WPInsertCodeShortcode with your shortcode
 WPInsertCode_options with your options array name
 _WPInsertCodeSettings with your settings name in app.js
4. Upload the plugin files to the `/wp-content/plugins/{your plugin name}` directory, or install the plugin through the WordPress plugins screen directly.
5. Activate the plugin through the 'Plugins' screen in WordPress
6. Add your shortcode to posts or pages.