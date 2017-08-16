<?php
/*
Plugin Name: WPInsertCode
Plugin URI:  https://github.com/tmtfns/WPInsertCode
Description: The backbone of the wordpress plugin allows you to add some code consisting of javascript code, css, html using  your shortcode [WPInsertCodeShortcode]. The plugin has the ability to edit its options, which are passed to the code.
Version:     0.1
Author:      tatiana
Author URI:  tmtfns@gmail.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: WPInsertCode
Domain Path: /languages

WPInsertCode is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WPInsertCode is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WPInsertCode. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
/*
 * please, replace everywhere
 * WPInsertCode with your plugin class name
 * WPInsertCodeShortcode with your shortcode
 * WPInsertCode_options with your options array name
 * _WPInsertCodeSettings with your settings name in app.js
 * 
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists('WPInsertCode') ) {
    /**
     * Main WPInsertCode class.
     */
    class WPInsertCode {

        /**
         * constructor
         */
        
        public function __construct() { 
                    
            register_activation_hook(__FILE__,  array( 'WPInsertCode', 'activate' ));
            register_deactivation_hook(__FILE__,  array( 'WPInsertCode', 'deactivate' ));
            // it is not best way to add your style sheet file. The second variant is preferable
            add_action('wp_enqueue_scripts', array( $this, 'register_styles' ));           
            add_action( 'init', array( $this, 'init' ) );
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('admin_init', array($this, 'admin_settings'));
        }
        /**
         * init front
         */
        public function init() {

            add_shortcode('WPInsertCodeShortcode', array( $this, 'shortcode' ));      
             
        }        
        /**
         * activation  plugin
         * check and add if not exist options
         * does not overwrite old options
         */
        
        public static function activate() {
            
            if (! get_option('WPInsertCode_options') )  {
                 add_option('WPInsertCode_options', array('option1' => 'first data', 'option2' => 'second data') );
            } 

        }          
        /**
         * deactivation  plugin
         * empty         
         */
        
        public static function deactivate() {
            
        }
        
        // front section
        /**
         * create shortcode html and register script to footer         
         * @return string
         */
        public function shortcode() {            
            
            add_action( 'wp_footer',  array( $this, 'register_scripts' ));
            return $this->_view('template');
        }
        /**
         * add style1.css file into head
         * it is not optimal way
         * remove  register_styles if you use the second way to add css file        
         */            
        public function register_styles() { 

            wp_register_style( 'WPInsertCode_style', plugins_url( 'css/style1.css', __FILE__ ) );
            wp_enqueue_style('WPInsertCode_style');
        
        }
        /**
         * register and add app.js file to footer.
         *  add localized options         
         */  
        
        public function register_scripts() {
            wp_register_script( 'WPInsertCode_script', plugins_url( 'js/app.js', __FILE__ ), NULL, NULL, TRUE);
            $opt = get_option('WPInsertCode_options');
            // second way to load css file
            $opt['cssUrl'] = plugins_url( 'css/style2.css', __FILE__ );
            $opt['cssId'] = 'WPInsertCodeStyle2';
            wp_localize_script( 'WPInsertCode_script', '_WPInsertCodeSettings', $opt );
            wp_enqueue_script('WPInsertCode_script');
        }
        // admin section
        /**
         * addmin setting for options               
         */ 
        public function admin_settings() {
            
            register_setting( 'WPInsertCode_options_group', 'WPInsertCode_options', array($this, 'sanitize_options') );
                
        }
        /**
         * add options page into admin menu.               
         */  
        public function admin_menu() {            
           
            add_options_page('WPInsertCode options', 'WPInsertCode', 'manage_options', 'WPInsertCode_options', array($this, 'admin_page') );
        }
        /**         
         *  print options page html from template     
         */  
        public function admin_page() {
            
             echo $this->_view('admin', array('options' => get_option('WPInsertCode_options')));
        }
        /**
         * sanitize your options before saving in db.        
         * @param  array
         * @return array         
         */  
        public function sanitize_options ($raw_options) {
            $result = array();
            foreach($raw_options as $k => $v){
                // you can use your own valodation rules for options
                $result[$k] = htmlspecialchars(strip_tags($v));
            }
            return $result;
           
        }
        // private sections
        /**
         * load a particular view file and pass data there
         * all files aare replaces inside views folder
         * return string contains html.
         * @param  string $file
         * @param  array data 
         * @return string
         */
        
        private function _view($file, $data = array()) {
              extract($data, EXTR_OVERWRITE);
              ob_start();    
              try {
                  include(dirname( __FILE__ ). '/views/'. $file . '.php'); 
              } catch (Exception $ex) {
                  ob_end_clean();
                  return '';
              }
              return ob_get_clean();
        }
    }
    
    new WPInsertCode();
}
