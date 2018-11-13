/*======================
// Wordpress Protected Content Filter 
========================*/
function alpha_pasword_protected_content($excerpt){
	if ( ! post_password_required() ) {
		return $excerpt;
	}else {
		echo get_the_password_form();
	}
}
add_filter( 'the_excerpt', 'alpha_pasword_protected_content' );
