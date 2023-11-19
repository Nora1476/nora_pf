<?php

	/* 서버 접속 */
  require_once("./dbconfig.php");	


 	
 	settype( $_POST['id'], "integer");
 	
  $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'phone'=>mysqli_real_escape_string($conn, $_POST['phone']),
	  'email'=>mysqli_real_escape_string($conn, $_POST['email']),
	  'type'=>mysqli_real_escape_string($conn, $_POST['type']),
	  'content'=>mysqli_real_escape_string($conn, $_POST['content']),
  );
  
  $sql = " update comment 
  					set
  						name = '{$filtered['name']}',
  						phone = '{$filtered['phone']}',
  						email = '{$filtered['email']}',
  						type = '{$filtered['type']}',
  						content = '{$filtered['content']}' 
  					  where id={$filtered['id']}  						
  			";
  			
  $result = mysqli_query($conn, $sql);
  
  if($result ===false){
  	echo "수정과정에서 오류";
  	error_log(mysqli_error($conn));
  }
 
?>