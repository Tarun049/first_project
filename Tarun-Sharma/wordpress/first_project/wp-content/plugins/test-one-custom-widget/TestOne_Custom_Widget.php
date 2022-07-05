<?php
/*
    known as header 
Plugin Name:  Custom Widget Test One
Plugin URI:   https://www.wpbeginner.com 
Description:  plugin to create Custom Widget 
Version:      2.1.1
Author:       Tarun Sharma
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  Third-Example
Domain Path:  /languages
*/


// creating custom widget


// hook called when widgits initalize
add_action("widgets_init", "register_custom_widget");
function register_custom_widget()
{
    register_widget("TestOne_Custom_Widget");// wp function to add custom widget in editor
}

class TestOne_Custom_Widget extends WP_Widget
{
    // for defining the variables and paramaters
    public function __construct()
    {
        parent::__construct('custom_widget_test_one', 'Custom Widget Test One',);
    }
    public function form( $instance )
    {
        // admin panel layout
        if ( isset( $instance[ 'text_title' ] ) ) {
            $title = $instance['text_title'];
        }
        else {
            $title = 'Default Title';
        }
        ?>
            <p>
                                            <!-- wp function to get name from database   -->
                <label for="<?php echo $this->get_field_id('text_title') ?>">Widget Title</label>
                <input type="text" name="<?php echo $this->get_field_name('text_title') ?>" id="<?php echo $this->get_field_id('text_title') ?>" value="<?php echo $title; ?>" placeholder="Enter Widget Title" class="widefat">
            </p>
        <?php
    }
    public function widget($args, $instance)
    {
        // front-end layout
        
        $title = apply_filters("widget_title", $instance['text_title']);// filter hook to add the content param 2 is value to be echo

        echo $args['before_title'];
        if ( !empty( $instance['text_title'] ) ) {
            echo $title;
        }
        echo $args['after_title'];
    }

    public function update($new_instance, $old_instance)
    {
        // for saving and upating the values to database
        $instance = array();
        $instance['text_title'] = ( ! empty( $new_instance['text_title'] ) ) ? $new_instance['text_title'] : '';
        return $instance;
    }
}
$test_one_widget = new TestOne_Custom_Widget();
