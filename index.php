<?php
/*
Plugin Name: Extend Post Data
Plugin URI: https://wordpress.org/plugins/mhm-extend-postdata/
Description: Automatically extends Post and Page data with an array containing all of the extra meta data pertinent to the $post object.
Author: Say Hello GmbH
Version: 1.0.9
Author URI: https://sayhello.ch/
*/

class MHM_ExtendPostdata
{

    public function dump( $var, $die = false )
    {
        echo '<pre>' . print_r($var, 1) . '</pre>';
        if ($die ) {
            die();
        }
    }

    public function __construct()
    {
        add_action('the_post', [ $this, 'extend_postdata' ]);
    }

    public function extend_postdata( $post )
    {
        if ($post ) {
            $post->metadata = get_post_meta($post->ID);
        }
    }
}

new MHM_ExtendPostdata();
