
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
  $user_name=$_POST['UserName'];
 $passwd=$_POST['Password'];
 $owner_fname=$_POST['ownerfname'];
 $owner_lname=$_POST['ownerlname'];
 $firstname=$_POST['fname'];
 $lastname=$_POST['lname'];
 $mob_no=$_POST['mob_no'];
 $email=$_POST['email'];

require 'conn.php';

$result5=mysql_query("select member_id from members where FirstName='$owner_fname' and LastName='$owner_lname'")or die(mysql_error);
$row5=mysql_fetch_array($result5);

$mem_id=$row5['member_id'];

$query1 = "INSERT INTO user_registration VALUES ('$user_name','$passwd','$owner_fname','$owner_lname','$mem_id','$email','$mob_no','$firstname','$lastname');";
$result1=mysql_query($query1);
$val =1;

if($result1)
{
$query2 = "INSERT INTO user_requests VALUES ('$user_name','$owner_fname','$owner_lname','$val','$mem_id','$email','$mob_no','$firstname','$lastname');";
$result2=mysql_query($query2);

echo "<script>
window.location='/wordpress/index.php';
</script>";

}
else
{
   echo "<script>
alert('ERROR in Registration TRY Again');
window.location='/wordpress/index.php/user-login/user-registration';
</script>";
}

?>
 <body >


 </body >

 </html>
