<?php
	
	session_start();
  require_once("./dbconfig.php");	

  //<!--php부분 form에 입력한 내용을 데이터베이스와 비교해서 로그인 여부를 알려준다.-->
  if(isset($_POST['current_pw'])&& isset($_POST['new_pw'])){ //post방식으로 데이터가 보내졌는지?
  	//print_r($_SESSION);	
  	
    $session_username = $_SESSION[ 'username' ];
 	  $current_pw = $_POST[ 'current_pw' ];
	  $new_pw = $_POST[ 'new_pw' ];
	  $new_re_pw = $_POST[ 'new_re_pw' ];
	  
	  
	  if ( !is_null( $current_pw ) ) {
 	
	    $sql = "SELECT password FROM login_info WHERE admin = '" . $session_username . "';";
	    $result = mysqli_query( $conn, $sql );
	    while ( $row = mysqli_fetch_array( $result ) ) {
	      $db_password = $row[ 'password' ];
	    }
 
      
	    
	    if ( $current_pw == $db_password ) {
	      if ( $new_pw == $new_re_pw ) {
	      	$sql_change_password = "UPDATE login_info SET password = '" . $new_pw . "' WHERE admin = '" . $session_username . "';";
	        mysqli_query( $conn, $sql_change_password );
	        session_destroy();
	        echo '성공';          
	      } else{
          echo '새로운비번실패';
	      }
	      
	    } else {
        echo '현재비번실패';
	    }
	    
	    
	  }			 
	}
    
      
?>