<?php 
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
  /// define('DB_PASSWORD', 'P@SSW)RD!@#$%');
   define('DB_PASSWORD', 'admin');
   //define('DB_PASSWORD', 'admin');
   //define('DB_DATABASE', 'franchisediscovery');
<<<<<<< HEAD
   define('DB_DATABASE', 'franchisediscovery');
=======

   define('DB_DATABASE', 'francise_discovery');
>>>>>>> 85a889fef5f3b693a44bac82aa1213b1320db1d1
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $baseURL = 'http://localhost:8012/franchisediscovery/franchisediscovery/';
   
   
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