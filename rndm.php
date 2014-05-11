
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
 <body onload="myFunction();">

 <?php
  $id=$_POST['idval'];
 echo "<script>
 function myFunction()
{

var y;
var x;
x=Math.floor((Math.random()*1000)+1);
alert(x);
var person=prompt('Enter the Security Number',' ');

if(person!=null && person==x)
  {
  window.location='http://wordpress/get_file.php?id=$id;
  }
  else
      {
          alert('You have entered incorrect number !!');
          window.location='http://wordpress/index.php/user-permission-files';
      }

}
</script>";

?>
</body>
 </html>
