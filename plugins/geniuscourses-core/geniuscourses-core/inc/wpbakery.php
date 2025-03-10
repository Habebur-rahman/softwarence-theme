<?php

class VcGeniuscoursesAbout {

    function __construct(){
        add_action('init', array($this, 'create_shortcode'),1000);
        add_shortcode('geniuscourses_about_shortcode', array($this,'render_shortcode'));
    }

    public function create_shortcode(){
        
        
        if(function_exists('vc_map')){
            vc_map(array(
                'name' => "GC About",
                'base' => 'geniuscourses_about_shortcode',
                'description' => '',
                'category' => 'Geniuscourses',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => 'Text',
                        'param_name' => 'text',
                        'value' => '',
                        'description' => 'Insert Text',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => 'Description',
                        'param_name' => 'content',
                        'value' => '',
                        'description' => 'Insert Description',
                    ),
                )
            ));
        }
        
    }

    public function render_shortcode($atts,$content,$tag){
        $atts = (shortcode_atts(array(
            'text' => '',
        ),
        $atts));

        $title = esc_html($atts['text']);
        $content = wpb_js_remove_wpautop($content,true);

        $result = '';
        $result .= '<h2>'.$title.'</h2>';
        $result .= '<div class="content_box">'.$content.'</div>';

        return $result;

    }
}
new VcGeniuscoursesAbout();