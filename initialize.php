<?php
$dev_data = array('id'=>'-1','firstname'=>'Developer','lastname'=>'','username'=>'dev_oretnom','password'=>'5da283a2d990e8d8512cf967df5bc0d0','last_login'=>'','date_updated'=>'','date_added'=>'');
// if(!defined('base_url')) define('base_url','http://localhost/bca-major/id-card-generator/');
if(!defined('base_url')) define('base_url','http://103.66.206.230/icard/');
if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' );
if(!defined('dev_data')) define('dev_data',$dev_data);
if(!defined('DB_SERVER')) define('DB_SERVER',"localhost");
if(!defined('DB_USERNAME')) define('DB_USERNAME',"id_generator");
if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"RgjW9ytg0rAD6q2g");
// if(!defined('DB_USERNAME')) define('DB_USERNAME',"root");
// if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"");
if(!defined('DB_NAME')) define('DB_NAME',"id_generator");
?>
