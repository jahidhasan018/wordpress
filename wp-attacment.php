<?php
//**************************/
// Attachmennt Settings
//**************************/

define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function philosophy_gallery_attachment( $attachments ){
  
  $post_id = null;
  if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
      $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
  }
  if ( ! $post_id || get_post_format( $post_id ) != "gallery" ) {
      return;
  }

  $fields         = array(
    array(
      'name'      => 'title',
      'type'      => 'text',
      'label'     => __( 'Title', 'philosophy' ),
      'default'   => 'title',
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Gallery Images',
    'post_type'     => array( 'post' ),
    'position'      => 'normal',
    'priority'      => 'high',
    'filetype'      => null,
    'note'          => 'Gallery image here!',
    'append'        => true,
    'button_text'   => __( 'Gallery Images', 'philosophy' ),
    'modal_text'    => __( 'Gallery', 'philosophy' ),
    'router'        => 'browse',
  'post_parent'   => false,
    'fields'        => $fields,

  );

  $attachments->register( 'gallery', $args );
}

add_action( 'attachments_register', 'philosophy_gallery_attachment' );


//**************************/
// OutPut Attcments
//**************************/
<?php 
  if ( class_exists( 'Attachments' ) ):
  $attachments = new Attachments( 'gallery' ); /* pass the instance name */ 
?>
<?php if ( $attachments->exist() ) : ?>
     
    <?php while( $attachment = $attachments->get() ) : ?>   
        <?php echo $attachments->image( 'philosophy-post' ); ?>
    <?php endwhile; ?>
        
<?php endif; endif; ?>
