/*======================
// Add class to menu li // filter -- nav_menu_css_class
========================*/

function alpha_menu_li_class( $classes, $item ){
	$classes[] = 'list-inline-item';
	return$classes; 
}
add_filter( 'nav_menu_css_class', 'alpha_menu_li_class', 10, 2 );




/*======================
// Wordpress Protected Content Filter // filter -- the_excerpt
========================*/
function alpha_pasword_protected_content($excerpt){
	if ( ! post_password_required() ) {
		return $excerpt;
	}else {
		echo get_the_password_form();
	}
}
add_filter( 'the_excerpt', 'alpha_pasword_protected_content' );

// Remove Protected content title // filter -- protected_title_format
function alpha_protected_title_change(){
	return "%s";
}
add_filter( 'protected_title_format', 'alpha_protected_title_change' );
