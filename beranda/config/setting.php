<?php
  include_once("const.php");
  

  function connectDB($config){  
    try {
      $host = $config["host"];
      $db = $config["db"];
      $username = $config["username"];
      $password = $config["password"]; 
      $conn = new PDO("mysql:host=$host;dbname=$db",  $username, $password);    
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      return $conn;   
    } catch (PDOException $e) {
      echo "Connection failed: ".$e->getMessage();  
    }
  }

  function main_menu()
  {
     $config = array("host"=>"localhost",
                     "username"=>"root",
                     "password"=>"",
                     "db"=>"dealermobil_db");
     $conn = connectDB($config);
     $pages=(isset($_GET["pages"] ))? $_GET["pages"] : '';
      switch($pages){
    case "pembeli" :
          include_once(path."pembeli/view.php");
          break;
           case "add_pembeli" :
          include_once(path."pembeli/form.php");
          break;
    
case "kendaraan" :
          include_once(path."kendaraan/view.php");
          break;          
   case "add_kendaraan" :
          include_once(path."kendaraan/form.php");
          break; 
 case "home" :
          include_once(path."home/biodata.php");
          break;    
        //default : 
         // include_once(path."home/biodata.php");
        //  break;
      
      }
  
  }
  
  function navigation(){
    $pages=(isset($_GET["pages"] ))? $_GET["pages"] : '';  
    $array_menu=array(array('file'=>'home',
                            'label'=>'biodata'),
                      array('file'=>'pembeli',            
                            'label'=>'Pembeli'),
                      array('file'=>'kendaraan',
                            'label'=>'Kendaraan'));
            
    $menu='';
    foreach($array_menu as $row_menu){
      $css_act=(@$_GET["pages"]==$row_menu['file'])? 'id="submenu-active"' : '';
      $menu.='<li '.$css_act.' ><a href="index.php?pages='.$row_menu['file'].'"><i class="fa fa-circle-o"></i> '.$row_menu['label'].'</a>';
    }                      
    return $menu;
  }
  
?>