<?php
session_start();
include "config.php";
$userid = $_SESSION['EMPLOYEEID'];
$pesan = mysql_query("SELECT * FROM NOTIFIKASI
    WHERE EMPLOYEEID='1' and STATUS='0' order by NOTIFIKASIID desc");
$j=0;
/*foreach ($pesan as $js)
{
	//echo $j."|".$js['STATUS']."|".$js['TIPE']."|".$js['MESSAGE1']."|".$js['MESSAGE2']."|".$js['LINK']."|".$js['TIMESTAMP']."|".$js['NOTIFIKASIID'];
$j++;
}*/
if($pesan === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
while($js = mysql_fetch_array($pesan))
  {
 echo $j."|".$js['STATUS']."|".$js['TIPE']."|".$js['MESSAGE1']."|".$js['MESSAGE2']."|".$js['LINK']."|".$js['TIMESTAMP']."|".$js['NOTIFIKASIID'];
$j++;
  }
/*$j = mysql_num_rows($pesan);
echo $j;
$js = mysql_fetch_array($pesan);
if($j>0){
    
}*/
?>
