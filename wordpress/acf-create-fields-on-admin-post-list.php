<?php

 /*
 * Add columns to some custom post list
 */
 
 public function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'start_date' => __ ( 'Starts' ),
     'end_date'   => __ ( 'Ends' ) 
   ) );
 }
 //Change the custom post type and the name of function to yours
 add_filter ( 'manage_{post type name}_posts_columns', 'add_acf_columns' );
 
 /*
 * Add columns to exhibition post list
 */
 
 /*
 * In this function you use switch to catch each field and show de value on post list
 */
 public function exhibition_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'start_date':
       echo get_post_meta ( $post_id, 'start_date', true );
       break;
     case 'end_date':
       echo get_post_meta ( $post_id, 'end_date', true );
       break;
   }
 }
 //Change the custom post type and the name of function to yours here too
 add_action ( 'manage_{Custom post type}_posts_custom_column', 'exhibition_custom_column', 10, 2 );
?>
