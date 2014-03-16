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

function load_template( $template_name ) {
	include ABSPATH . '/templates/' . $template_name . '.php';
}

Router::addRoute( '', function(){
	load_template( 'header' );
	load_template( 'pages/index' );
	load_template( 'footer' );
} );

Router::addRoute( 'start', function(){
	load_template( 'header' );
	load_template( 'pages/start' );
	load_template( 'footer' );
} );

Router::addRoute( '12', function(){
	load_template( 'header' );
	load_template( 'pages/two' );
	load_template( 'footer' );
} );

Router::addRoute( '44', function(){
	load_template( 'header' );
	load_template( 'pages/three' );
	load_template( 'footer' );
} );

Router::addRoute( '514229', function(){
	load_template( 'header' );
	load_template( 'pages/four' );
	load_template( 'footer' );
} );

$callback = Router::getRoute();
if( !$callback ){

	load_template( 'header' );
	echo 'You have come to a place that does not exist. Good job. Try again.';
	load_template( 'footer' );

} else {
	
	$callback();

}
