<?php  
	
  /* 서버 접속 */
  require_once("./dbconfig.php");	

  settype( $_POST['id'], "integer");
  
   $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'issue'=>mysqli_real_escape_string($conn, $_POST['issue']),
    'kind'=>mysqli_real_escape_string($conn, $_POST['kind']),
	'date'=>mysqli_real_escape_string($conn, $_POST['date']),
  );
  


  $sql = " 
            update pf_list 
            set
                title = '{$filtered['title']}',
                issue = '{$filtered['issue']}',
                kind = '{$filtered['kind']}',
                date = '{$filtered['date']}'
                where no = '{$filtered['id']}'			
        ";

   $result = mysqli_query($conn, $sql);

	  
	 if($result ===false){
		 $error = mysqli_error($conn);
		 echo $error;
  }
 
   
	// $array = print_r($_FILES);
	// echo $$array;

	//전역변수 선언
	$no = $filtered['id'];

	if(is_array($_FILES)) {
     
     foreach ($_FILES['pf_img']['name'] as $name => $value) {

      $file_size =$_FILES['pf_img']['size'];
      $file_tmp =$_FILES['pf_img']['tmp_name'];
      $file_type=$_FILES['pf_img']['type'];
    
      $file_name = explode(".", $_FILES['pf_img']['name'][$name]);  // '.'을 기준으로 잘라 배열로 저장 ( 0번째 배열: 파일이름, 1번째 배열: 확장자 )  
      $allowed_ext = array("jpg", "jpeg", "png", "gif");		
      
      if(in_array($file_name[1], $allowed_ext)) {    // $file_name의 1번째 배열인 확장자명이 이미지 파일에 해당하는지 확인
          
        $new_name =  md5(rand()) . '.' . $file_name[1];  
        $sourcePath =  $file_tmp[$name];  
        $targetPath = "../img/uploads/".$new_name;  
        
              
        if(move_uploaded_file($sourcePath, $targetPath)) {    //move_uploaded_file($file_path, $destination) 임시경로에 있는 파일을 원하는 경로로 이동
					//전역변수 사용
					global $no;

	      	// 이미지파일 경로 db파일에 업로드
	      	$sql = "INSERT INTO pf_img (mno, file) VALUES ($no, '$targetPath' )";
	      	mysqli_query($conn, $sql);  
	      }                 
      }            
    }         
 }  

 mysqli_close($conn);
 
 ?>