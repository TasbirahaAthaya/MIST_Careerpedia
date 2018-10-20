<?php

// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('mist','mist','localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT username FROM all_user');
oci_execute($stid);
$arr=array();
while(($row = oci_fetch_array($stid))!=False) {
    // var_dump($row);
    // var_dump($row);
    $arr[]=$row[0];
	//$arr[]=$row[1];
	//$arr[]=$row['LNAME'];
}
echo json_encode($arr,true);
oci_free_statement($stid);
oci_close($conn);

?>
