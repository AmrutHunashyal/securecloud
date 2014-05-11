
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

 <style type="text/css">
 <!--
 .style1
 {
     color: #FF0000
 }
 -->
 </style>
 </head>
 <?php

 require 'conn.php';
  $user_name=$_POST['usn'];
  $reqval=0;
    

$query1 = "UPDATE user_requests set request='$reqval' where username ='$user_name';";
$result1=mysql_query($query1);


if($result1)
{
echo "<script>
window.location='/wordpress/index.php/file-upload';
</script>";

}
else
{
   echo "<script>
alert('ERROR in Registration TRY Again');
window.location='/wordpress/index.php/file-upload';
</script>";
}

?>
 <body >


 </body >

 </html>

