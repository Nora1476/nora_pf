<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use

// ssp.class.php 파일에서 `$table` 부분 백틱없애기 -> $table
// 테이블 join  
$table = <<<EOT
 (
    SELECT * from pf_list as A 
    left join (select  mno, min(file) file from pf_img group by mno) as B 
    on A.no = B.mno  order by no desc

 ) temp
EOT;
 
 
// Table's primary key
$primaryKey = 'no'; 
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
 	array( 'db' => 'no', 'dt' => 0 ),
    array( 'db' => 'title', 'dt' => 1 ),
    array( 'db' => 'issue',  'dt' => 2 ),
    array( 'db' => 'kind',   'dt' => 3 ),
    array( 'db' => 'date',   'dt' => 4 ),
    array( 
            'db' => 'file',
            'dt' => 5,
            'formatter' => function( $d, $row ) {
                if($d == null){
                    return "<div class='no_img'>이미지 없음</div>";
                }else{
                return "<img src='/$d' style='height:60px;width:100px;'/>";
                }
            }       	
    ),    
    array(
        'db'        => 'regi_date',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            return date( 'Y/m/d  H:i:s', strtotime($d));
        }
    )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'nora',
    'pass' => 'qm8046qm!',
    'db'   => 'nora',
    'host' => 'localhost'
);


 
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);