<?php

	require_once("./dbconfig.php");	
 	
 	settype( $_POST['id'], "integer");
 	
  $filtered = array(
   'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  );
  
  $sql = "delete from pf_list
 						where no={$filtered['id']}  						
  				";

      
  $result = mysqli_query($conn, $sql);
  
  
 
?>