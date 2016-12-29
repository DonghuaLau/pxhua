<?php
$idx = "index";

if($idx == "index"){
	get_template_part('templates/page', "morn");
}else{
	include("index_orig.php");
}
