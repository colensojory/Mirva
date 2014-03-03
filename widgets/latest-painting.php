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
        parent::__construct( false, $name = __('Mirva - Latest Painting', 'mirva'), $widget_ops );
    }

    function form($instance){
        if( $instance ){
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        } ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', 'mirva'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
    <?php }

    function widget($args, $instance) { 
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
            if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            $widget_args = array( 'posts_per_page' => 1, 'post_type' => 'mirva_portfolio' );
            $query = new WP_Query( $widget_args );
            while ($query->have_posts()) : $query->the_post();
                $image_id = get_post_thumbnail_id(); 
                $image_url = wp_get_attachment_image_src($image_id,'photo-feature', true);
                echo '<figure>';
                    echo '<img src="'.  $image_url[0] .'">';
                echo '</figure>';
            endwhile; wp_reset_postdata(); 
        echo $args['after_widget'];
    }
    
    function update($new_instance, $old_instance) {
          $instance = $old_instance;
          // Fields
          $instance['title'] = strip_tags($new_instance['title']);
          $instance['text'] = strip_tags($new_instance['text']);
          $instance['textarea'] = strip_tags($new_instance['textarea']);
         return $instance;
    }
    
    
}

add_action( 'widgets_init', function(){
    register_widget( 'mirva_latest_widget' );
});

?>