<?php 
//overrides lenght of excerpt
function new_excerpt_length($length) {
	return 13;
}

add_filter('excerpt_length', 'new_excerpt_length');