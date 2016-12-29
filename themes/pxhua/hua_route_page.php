<?php 

function hua_page_home10(){
	get_template_part("templates/page", "home10");
}

function hua_page_home11(){
	get_template_part("templates/page", "morn");
}

function dashangcloud_notify()
{
	dslog('DEBUG', 'dashangcloud notify: ' . var_dump_string($_POST));
	if($_POST['key'] == '123456789'){
		echo 'true';
	}else{
		echo 'false';
	}
}

?>
