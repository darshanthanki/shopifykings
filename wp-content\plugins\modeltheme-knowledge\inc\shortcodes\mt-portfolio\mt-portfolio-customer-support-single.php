<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Knowledge List Accordion
*/
function mt_shortcode_portfolio_customer_support_single($params,  $content) {
    extract( shortcode_atts( 
        array(
            'order_element1'       =>'',
            'animation'           =>'',
        ), $params ) );

  $html = '';       

    $active = '';
    if($order_element1 == 1) {
        $html .= '<div class="tab-content">';
        $active = 'in active';
    }
	global $post;
	
	$post_id = $post->ID;
	
	
	
    $html .= '<div id="customer-support" class="tab-pane fade '.$active.'">';
      
	  if(!empty(tikidocs('support_section'))) {
        $html .= '<div class="row">';
        //  $html .= tikidocs('support_section');
		  $html .= get_field("screenshots",$post_id);
		 $html .= '</div>';
      }
    $html .= '</div>';
    if($order_element1 == 2) {
      $html .= '</div>';
    }

  return $html;
}
add_shortcode('mt_portfolio_customer_support_single_short', 'mt_shortcode_portfolio_customer_support_single');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    vc_map( array(
        "name" => esc_attr__("MT - Customer Support Single Portfolio", 'mtknowledge'),
        "base" => "mt_portfolio_customer_support_single_short",
        "icon" => "smartowl_shortcode",
        "category" => esc_attr__('MT: ModelTheme', 'mtknowledge'),
        "description" => "asdasd",
        "params" => array(
            // add params same as with any other content element 
            array(
              "group" => "Options",
              'type'     => '...',
              'param_name'  => 'test',             
              'heading'    => __('Customer Support Section', 'mtknowledge'),            
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "The content for this shortcode can be changed here <a target='_blank' href='/wp-admin/admin.php?page=Tikidocs&tab=28'>Link here</a>",
            ), 
            array(
              "group" => "Options",
              'type'     => 'dropdown',
              'param_name'  => 'order_element1',             
              'heading'    => __('Select order element', 'mtknowledge'),            
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "Choose the correct order for this element",
              'value'  => array(
                  'Other element' => '0',
                  'First element' => '1',
                  'Last element'  => '2'
              ),
            ), 
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", 'mtknowledge'),
              "param_name" => "animation",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
            )
        ),
    ) );
}
?>
