// JavaScript Document
/*
 * example of loading yout css file for shortcode
 */
// pure Javascript mode

(function(){    
    if (! document.getElementById(_WPInsertCodeSettings.cssId)) {       
        var cssLink = document.createElement('link');
        // set link attributes
        cssLink.setAttribute('id',_WPInsertCodeSettings.cssId);
        cssLink.setAttribute('rel', 'stylesheet');
        cssLink.setAttribute('type', 'text/css'); 
        cssLink.setAttribute('href',_WPInsertCodeSettings.cssUrl); 
        cssLink.setAttribute('media', 'all');
        // add load listener if you need;
        cssLink.onload = function() {
            console.log('css file is loaded');
        }
        // add link to head
        document.getElementsByTagName('head')[0].appendChild(cssLink);
        
    }
})();

//jquery mode in WordPress style
/*
jQuery(document).ready(function( $ ) {
    if ($('#' +_WPInsertCodeSettings.cssId).length == 0) {
        var cssLink = $("<link/>", {
            id:_WPInsertCodeSettings.cssId,
            rel: "stylesheet",
            type: "text/css",
            href:_WPInsertCodeSettings.cssUrl,
            media: 'all'
        });
        // add load listener if you need;
        cssLink.on('load', function(){
            console.log('css file is loaded');
        });
        // add link to head
        cssLink.appendTo("head");
    }
    
});
*/