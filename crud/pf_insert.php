<?php  
	
  /* 서버 접속 */
  require_once("./dbconfig.php");	
  
   $filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'issue'=>mysqli_real_escape_string($conn, $_POST['issue']),
		'date'=>mysqli_real_escape_string($conn, $_POST['date']),
  );
  


	 $sql = "
  INSERT INTO pf_list
    (title, issue, date, regi_date)
    VALUES(
      '{$filtered['title']}',
      '{$filtered['issue']}',
      '{$filtered['date']}',
       NOW()
    )";

   
   $result = mysqli_query($conn, $sql);
   
  
 if(is_array($_FILES))   
 {  
    foreach ($_FILES['pf_img']['name'] as $name => $value) {
    	

      $file_size =$_FILES['pf_img']['size'];
      $file_tmp =$_FILES['pf_img']['tmp_name'];
      $file_type=$_FILES['pf_img']['type'];


      $file_name = explode(".", $_FILES['pf_img']['name'][$name]);  // '.'을 기준으로 잘라 배열로 저장 ( 0번째 배열: 파일이름, 1번째 배열: 확장자 )  
      $allowed_ext = array("jpg", "jpeg", "png", "gif");		
      
      if(in_array($file_name[1], $allowed_ext)) {    // $file_name의 1번째 배열인 확장자명이 이미지 파일에 해당하는지 확인
          
        $new_name =  md5(rand()) . '.' . $file_name[1];  
        $sourcePath = $_FILES['pf_img']['tmp_name'][$name];  
        $targetPath = "../img/uploads/".$new_name;  
        
              
        if(move_uploaded_file($sourcePath, $targetPath)) {    //move_uploaded_file($file_path, $destination) 임시경로에 있는 파일을 원하는 경로로 이동
	      	// 이미지파일 경로 db파일에 업로드
	      	$sql = "INSERT INTO pf_img (mno, file) VALUES ((SELECT MAX(no) FROM pf_list), '$targetPath' )";
	      	mysqli_query($conn, $sql);  
	      }                 
      }            
    }         
 }  
 ?>