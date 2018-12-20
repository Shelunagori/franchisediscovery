<?php 
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
  /// define('DB_PASSWORD', 'P@SSW)RD!@#$%');
   define('DB_PASSWORD', '');
   //define('DB_DATABASE', 'franchisediscovery');
   define('DB_DATABASE', 'francise_discovery');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   //$baseURL = 'http://franchisediscovery.in/';
   $baseURL = 'http://localhost/franchise/';
   
	function seo_url($vp_string)
    {
        $vp_string = trim($vp_string);
        $vp_string = html_entity_decode($vp_string);
        $vp_string = strip_tags($vp_string);
        $vp_string = strtolower($vp_string);
        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
        $vp_string = preg_replace('~ ~', '-', $vp_string);
        $vp_string = preg_replace('~-+~', '-', $vp_string);
//        $vp_string .= "/";
        return $vp_string;
    }   
   
   
?>