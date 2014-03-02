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
       parent::__construct(
           false, 
           $name = __('Mirva - Lastest Painting', 'mirva')
           array( 'description' => __( 'Displays a thumbnail of the latest painting in Mirva Portfolio', 'mirva' ),
       ) 
    }
    
}


?>