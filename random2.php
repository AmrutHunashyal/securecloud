
 <?php
 require 'conn.php';


 //if (isset($_POST['submit'])) {//condition kun e click ang button
$UserName=$_POST['UserName'];//variable ang $Username kag ang $_POST['UserName'] ay value sang textbox nga UserName
$Password=$_POST['Password'];//variable ang $Username kag ang $_POST['Password'] ay value sang textbox nga Password
//}


?>

    <form method="post" action="/wordpress/login.php">
<input type="hidden" value="<?php $UserName ?>" name="UserName">
<input type="hidden" value="<?php $Password ?>" name="Password">
</form>
     <script>

(function myFunction()
{
var x;


x=Math.floor((Math.random()*10000)+1);
alert(x);
var person=prompt('Please enter the code',' ');

if (person!=null && person==x)
  {
    window.location='http://wordpress/login.php';

  }
  else
      {
          var  z= 'Wrong Code !';
          alert(z);
          window.location='http://wordpress/index.php/owner-login';
      }
})();

</script>";



<?php
//   echo mysqli_error($this->db_link);


?>
 
 </html>
