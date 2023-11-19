<?php

   
   session_start(); 
   require_once("./dbconfig.php");	
   
   //<!--php부분 form에 입력한 내용을 데이터베이스와 비교해서 로그인 여부를 알려준다.-->
   if(isset($_POST['admin'])&& isset($_POST['password'])){ //post방식으로 데이터가 보내졌는지?
    
    
		//index_admin.html에서 입력받은 admin, password
	  $username=$_POST['admin'];
    $userpw=$_POST['password'];     
  
    $sql="SELECT * FROM login_info where admin='$username' and password='$userpw'";
    $result = $conn->query($sql);
    
    //넘어온 결과를 한 행씩 패치해서 $row 라는 배열에 담아낼 수 있습니다.
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    //결과가 존재하면 세션 생성
    if ($row != null) {
      $_SESSION['username'] = $row['admin'];
      // print_r($_SESSION);
      echo "<script>alert('로그인 되었습니다.')</script>";
      echo "<script>location.replace('../admin_index.php');</script>";
      exit;
    }
      
     //결과가 존재하지 않으면 로그인 실패
    if($row == null){
       echo "<script>alert('아이디, 패스워드가 일치하지 않습니다.')</script>";
       echo "<script>location.replace('../admin.php');</script>";
       exit;
    }	
			 
	}
    
      
?>