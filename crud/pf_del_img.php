<?php

	/* 서버 접속 */
  require_once("./dbconfig.php");	
  	

  $filtered = array(
   'file'=>mysqli_real_escape_string($conn, $_POST['file']),
  );
  
  
  
  $sql = "delete from pf_img
 						where file='{$filtered['file']}'				
  				";
  		
	echo '<script>';
	echo 'console.log("'.$sql.'")';
	Echo '</script>';
 
	$result = mysqli_query($conn, $sql);
  

 
?>

