<?php
include('conn.php');
session_start();
 if(!isset ($_SESSION['username']))
    {
    header('location:User_Login.php');
}
?>

<?php
// Make sure an ID was passed
$user_user=$_SESSION['username'];

if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);


    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', 'root', 'cloud');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

       

        // Fetch the file information
        $query = "
            SELECT `mime`, `name`, `size`, `data`,ownerfname,ownerlname,member_id
            FROM `file`
            WHERE `id` = {$id}";
        $result = $dbLink->query($query);


        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);

                // Print headers
                 header("Content-Type: ". $row['mime']);
                 header("Content-Length: ". $row['size']);
                 header("Content-Disposition: attachment; filename=". $row['name']);
                 $filename =$row['name'];
                 $ownerf_name =$row['ownerfname'];
                 $ownerl_name =$row['ownerlname'];
                 $mid =$row['member_id'];
                // Print data
                echo $row['data'];

                 $query2 = "INSERT INTO logs VALUES (NOW(),'$filename','$user_user','$ownerf_name','$ownerl_name','$mid')";
        // Execute the query
                 $result2 = $dbLink->query($query2);
                 ?>
     <?php
            }
            else
            {
                echo 'Error! No image exists with that ID.';
            }
           
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>