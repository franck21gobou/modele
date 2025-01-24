<?php 

function create_slug($string /* créer Slug */){// 
	$slug=preg_replace('/[^A-Za-z0-9-]+/','-',$string) . '-'.time();
	return $slug;
}