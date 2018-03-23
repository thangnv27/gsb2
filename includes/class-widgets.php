<?php
/**
 * AVIA TAG CLOUD
 *
 * Widget that display tags
 *
 * @package AviaFramework
 * @todo replace the widget system with a dynamic one, based on config files for easier widget creation
 */
if (!class_exists('avia_tag_cloud_widget')) {

    class avia_tag_cloud_widget extends WP_Widget {

        function avia_tag_cloud_widget() {
            //Constructor
            $widget_ops = array('classname' => 'avia_tag_cloud_widget', 'description' => 'A widget that displays your custom tagcloud');
            $this->WP_Widget('avia_tag_cloud_widget', THEME_NAME . ' Tag Cloud', $widget_ops);
        }

        function widget($args, $instance) {
            // prints the widget
            extract($args, EXTR_SKIP);
            $title = empty($instance['title']) ? 'Tags Cloud' : $instance['title'];
            $number = empty($instance['count']) ? 4 : $instance['count'];

            echo $before_widget;
            if (!empty($title)) {
                echo $before_title . $title . $after_title;
            }
            echo "<div class='tagcloud'>";
            wp_tag_cloud("smallest=12&largest=12&unit=px&number=$number");
            echo "</div>";
            echo $after_widget;
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            foreach ($new_instance as $key => $value) {
                $instance[$key] = strip_tags($new_instance[$key]);
            }

            return $instance;
        }

        function form($instance) {
            //widgetform in backend
            $instance = wp_parse_args((array) $instance, array('count' => 40));
            if (!is_numeric($instance['count']))
                $instance['count'] = 40;
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('count'); ?>">Number of tags you want to display:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo esc_attr($instance['count']); ?>" />
            </p>
            <?php
        }

    }

}
/**
 * AVIA CATEGORIES
 *
 * Widget that display page list
 *
 * @package AviaFramework
 * @todo replace the widget system with a dynamic one, based on config files for easier widget creation
 */
if (!class_exists('avia_categories_widget')) {

    class avia_categories_widget extends WP_Widget {

        function avia_categories_widget() {
            //Constructor
            $widget_ops = array('classname' => 'avia_categories_widget', 'description' => 'A widget that displays your posts of categories');
            $this->WP_Widget('avia_categories_widget', THEME_NAME . ' Categories', $widget_ops);
        }

        function widget($args, $instance) {
            // prints the widget
            extract($args, EXTR_SKIP);
            $title = empty($instance['title']) ? 'Popular Post' : $instance['title'];
            $cats = json_decode($instance['cats']);

            echo $before_widget;
            if (!empty($title)) {
                echo $before_title . $title . $after_title;
            }

            echo "<ul>";
            $loop = new WP_Query(array(
                'category__in' => $cats,
//                'tax_query' => array(
//                    'relation' => 'OR',
//                    array(
//                        'taxonomy' => 'video_category',
//                        'field' => 'id',
//                        'terms' => $cats
//                    ),
//                )
            ));
            while($loop->have_posts()) : $loop->the_post();
                echo '<li class="post-item-' . get_the_ID() . '">';
                echo '<a href="' . get_permalink() . '">';
                echo get_short_content(get_the_title(), 72);
                echo '</a>';
                echo '</li>';
            endwhile;
            echo "</ul>";
            echo $after_widget;
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            foreach ($new_instance as $key => $value) {
                if ($key == 'cats') {
                    $instance[$key] = json_encode($new_instance[$key]);
                } else {
                    $instance[$key] = strip_tags($new_instance[$key]);
                }
            }

            return $instance;
        }

        function form($instance) {
            //widgetform in backend
            $cats = json_decode($instance['cats']);
            if(!is_array($cats)) $cats = array();

            $categories = get_categories(array(
                    'taxonomy' => array('category')
                )
            );
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('cats'); ?>">Include categories:</label>
                <select name="<?php echo $this->get_field_name('cats'); ?>[]" id="<?php echo $this->get_field_id('cats'); ?>" 
                        style="display: block;width: 100%" multiple>
            <?php
            foreach ($categories as $cat) {
                echo '<option value="', $cat->term_id, '" ', in_array($cat->term_id, $cats) ? ' selected="selected"' : '', '>', $cat->name, '</option>';
            }
            ?>
                </select>
            </p>
            <?php
        }

    }

}

/*
 *  activate widgets
 */
if (!function_exists('ppo_register_avia_widgets')) {

    function ppo_register_avia_widgets() {
        register_widget('avia_tag_cloud_widget');
        register_widget('avia_categories_widget');
    }

    ppo_register_avia_widgets(); //call the function immediatly to activate
}