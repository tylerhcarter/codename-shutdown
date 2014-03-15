<?php

define( 'DOMAIN', 'http://localhost' );
define( 'STARTURI', '/play/' );
define( 'ABSPATH', __DIR__ );

error_reporting(E_ALL);

include ABSPATH . '/lib/navigation.php';
include ABSPATH . '/lib/router.php';

function get_url( $path = '' ){
	return DOMAIN . STARTURI . $path;
}

function get_page_id(){
	return str_replace( STARTURI, '', $_SERVER['REQUEST_URI'] );
}

function load_template( $template_name ) {
	include ABSPATH . '/templates/' . $template_name . '.php';
}

$callback = Router::getRoute( get_page_id() );
if( !$callback ){

	load_template( 'header' );
	echo 'You have come to a place that does not exist. Good job. Try again.';
	load_template( 'footer' );

} else {
	
	$callback();

}
