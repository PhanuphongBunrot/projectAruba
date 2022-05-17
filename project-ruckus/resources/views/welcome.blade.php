 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
 initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>

    <h1>User Page</h1>
  <?php

use phpDocumentor\Reflection\Types\Null_;

  $t = date_default_timezone_set('Asia/Bangkok'); 
  $arr=json_decode( $resp1,true) ;
  //print_r ($arr['list'][1]) ;
  for ( $i =0 ; $i < count($arr['list']); $i++ ){
 //echo ($arr['list'][$i]['hostname'] ." ".$arr['list'][$i]['apMac'] ." ".$arr['list'][$i]['sessionStartTime']."<br>");
 
//echo ($arr['list'][$i]['traffic'] . "<br>");
      $tole = ($arr['list'][$i]['traffic'] /1024)/1024;
      echo  $arr['list'][$i]['apMac']."-----> ".number_format($tole, 1)  ." "." MB  <br>"; 
      
           //var_dump($arr['list'][$i]['sessionStartTime']) ;
            
            
            
        
    }
    
   
     
    // $datetime = new DateTime("@$t");
    // echo $datetime->format('d-m-Y H:i:s');
  ?>  
  
</body>
</html>