<?php
include('conn.php');
session_start();
if (!isset($_SESSION['member_id'])){
header('location:index.php');
}
//
?>

<?php
//mag show sang information sang user nga nag login
$member_id=$_SESSION['member_id'];

$result5=mysql_query("select * from members where member_id='$member_id'")or die(mysql_error);
$row5=mysql_fetch_array($result5);

$FirstName=$row5['FirstName'];
$LastName=$row5['LastName'];
// Check if a file has been uploaded

if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'cloud');
        if(mysqli_connect_errno()) 
        {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
            // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);

        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`, ownerfname,ownerlname,member_id
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW(),'{$FirstName}', '{$LastName}','{$member_id}'
            )";

        // Execute the query
        $result = $dbLink->query($query);

        // Check if it was successfull
        if($result) {
            echo '<script>alert("Success! Your file was successfully added!")</script>';
        }
        else {
            echo '<script>alert("Error in Insertion Try Again !!");
window.location="/wordpress/index.php/file-upload";
</script>';
        }
    }
    else {
        
            echo '<script>alert("Choose the File to be uploaded !!");
window.location="/wordpress/index.php/file-upload";
</script>';

    }

    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}

// Echo a link back to the main page
echo "<script>
window.location='/wordpress/index.php/file-upload';
</script>";

?>
