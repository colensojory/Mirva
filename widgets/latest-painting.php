<?php
/*
Widget Name: Latest Painting
Description: Displays a thumbnail of the latest painting in Mirva Portfolio.
Author: Colenso Jory
Author URI: http://colensojory.github.io
Version: 0.1
*/

class mirva_latest_widget extends WP_Widget {
    
    function __construct() {
        $widget_ops = array( 'description' => __( 'Displays a thumbnail of the latest painting in Mirva Portfolio', 'mirva' ));
        parent::__construct( false, $name = __('Mirva - Lastest Painting', 'mirva'), $widget_ops );
    }
    function form() {
        
    }
    function update() {
        
    }
    function widget($args, $instance) {
        
    }
    
}

add_action( 'widgets_init', function(){
    register_widget( 'mirva_latest_widget' );
});

?>