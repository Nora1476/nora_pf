 <?php
 
  require_once("./dbconfig.php");	
  
  settype( $_POST['mno'], "integer");
  
 
   $filtered = array(
		'mno'=>mysqli_real_escape_string($conn, $_POST['mno']),
		);
  
 
  
  $sql = "select * from pf_img where mno={$filtered['mno']}";
  $result = mysqli_query($conn,$sql);
  
  //echo '<script>';
	//echo 'console.log("'.$filtered['mno'].'")';
	//echo '</script>';
	
   while($row = mysqli_fetch_array($result)){
    
     echo "<img src='{$row['file']}' alt='img' class='img_detail' />";
	    
   }
   
  
  
  ?>