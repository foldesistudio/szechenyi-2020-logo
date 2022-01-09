<?php

if ( !defined( 'ABSPATH' ) ) exit;

/*
* Call: $data = apply_filters('szechenyi_2020_filter_sample', $data);
*/

function szechenyi_2020_619_filter_sample($data) {
    
    return $data;

}
add_filter( 'szechenyi_2020_filter_sample', 'szechenyi_2020_619_filter_sample', 10, 1 );


/*
* if (has_action('szechenyi_2020_action_sample')) {
*   do_action('szechenyi_2020_action_sample', $data);    
* }  
*/
function szechenyi_2020_619_action_sample($data) {

    // echo $data;
      
}
add_action('szechenyi_2020_action_sample', 'szechenyi_2020_619_action_sample', 10, 1);
