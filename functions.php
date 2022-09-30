<?php 

class WSUChildNewsScripts {

    /*==============================================================
        Register child theme CSS in front-end and admin area
    ===============================================================*/
    public static function init() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 5 );
	}


    public static function enqueue_scripts(){
        $parenthandle = 'wsuwp-theme-wds'; 
        $theme = wp_get_theme();

        wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.min.css' , array( $parenthandle ), $theme->get('Version') );
        
    }
    
}

WSUChildNewsScripts::init();