<?php

	/* db 접속 */
  $servername = "nora.dothome.co.kr/myadmin";
  $user = "nora ";
  $password = "qm8046qm!";
  $dbname = "nora";
  
  $conn = new mysqli($servername, $user, $password, $dbname);
  
  
  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
  
  ?>