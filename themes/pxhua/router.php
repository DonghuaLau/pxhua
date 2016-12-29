<?php

// hasn't use yet

/*
 *  My route definition
 */
global $g_hua_routing;
$g_hua_routing = array(
             //array(need login?, '/router/uri', 'router_handler')
             array(0, '/home10', 'hua_page_home10')
            ,array(0, '/home11', 'hua_page_home11')
            ,array(0, '/bookshelf', 'hua_page_bookshelf')
            ,array(0, '/calendar', 'hua_page_calendar')
            ,array(0, '/html5/fireworks', 'hua_page_html5_fireworks')
            ,array(0, '/html5/mplayer', 'hua_page_html5_mplayer')
            ,array(0, '/html5/flowchart', 'hua_page_flowchart')
            ,array(0, '/kb/demo', 'hua_page_koubei_demo')
            ,array(0, '/js/weixin', 'hua_page_weixin_js')
            ,array(0, '/demo/iframe', 'hua_page_demo_iframe')
            ,array(0, '/dashang/image', 'hua_page_dashang_image')
            ,array(0, '/dashang/button', 'hua_page_dashang_button')
            ,array(0, '/becktu', 'hua_page_becktu')
	);

function hua_routing_load($route)
{
	global $g_hua_routing;
    foreach($g_hua_routing as $routing){
		echo $routing[1] . ' -- ' . $route . '<br/>';
        if($routing[1] == $route){
        	$routing[2]();
        }
    }

}
