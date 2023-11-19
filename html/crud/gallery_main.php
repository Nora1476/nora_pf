 <?php
 
  require_once("./dbconfig.php");	
  
   
  $sql = "select * from pf_list a 
          left join pf_img b 
          on a.no = b.mno 
          where file is not null order by no desc;";

  $result = mysqli_query($conn,$sql);
  $output = array(); // 응답값으로 보낼 값
 


   while($row = mysqli_fetch_array($result)){

    // echo '$row : ';
    // print_r($row);
    // echo '<br>';

    array_push($output,
    array(
        'no' => (int)($row['no']),
        'title' => urlencode($row['title']),
        'issue' => urlencode($row['issue']),
        'kind' => $row['kind'],
        'certifi_date' => $row['certifi_date'],
        'file' => $row['file']
        )
    );
    
    // echo "<li class='gallery_item is_loading'>" ;
    // echo   "<figure>" ;
    // echo     "<img src='{$row['file']}'  alt='{$row['title']}'>" ;
    // echo   "</figure>" ;
    // echo "</li>";

   }

   
  //한글이 깨지는 이슈 방지코드urldecode()
  echo urldecode(json_encode($output));
   
  
  
  ?>