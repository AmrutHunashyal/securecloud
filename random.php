
 <?php
 require 'conn.php';

if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);



?>
     <script>
(function myFunction()
{
var x;


x=Math.floor((Math.random()*1000)+1);
alert(x);
var person=prompt('Please enter the code',' ');

if (person!=null && person==x)
  {
    window.location='http://wordpress/get_file.php?id=<?php echo $id ?>';
    
  }
  else
      {
          var  z= 'Wrong Code !';
          alert(z);
          window.location='http://wordpress/index.php/user-page';
      }
})();

</script>";

<?php
//   echo mysqli_error($this->db_link);
}

?>
 
 </html>
