<html>
    <head>
        <style>

body {
	background: #DCDDDF url("back.png");
	color: #000;
	font: 14px Arial;
	margin: 0 auto;
	padding: 0;
	position: relative;
}

table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Georgia;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin-left:-370px;
        margin-top: 210px;



	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:5px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
        position: absolute;
}
table th {
	padding:15px 20px 18px 20px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;
font-family: Georgia;
font-size: 15px;
	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr{
	text-align: center;
	padding-left:20px;
}
table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table tr td {

	padding:10px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
         font-family:  Georgia;
         font-size: 15px;
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
	border-bottom:0;
}
table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}




input[type="text"]{

    padding: 5px;
    border: 1px solid #DDDDDD;

    /*Applying CSS3 gradient*/
    background: -moz-linear-gradient(center top , #FFFFFF,  #EEEEEE 1px, #FFFFFF 20px);
    background: -webkit-gradient(linear, left top, left 20, from(#FFFFFF), color-stop(5%, #EEEEEE) to(#FFFFFF));


    /*Applying CSS 3radius*/
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;

    /*Applying CSS3 box shadow*/
    -moz-box-shadow: 0 0 2px #DDDDDD;
    -webkit-box-shadow: 0 0 2px #DDDDDD;
    box-shadow: 0 0 2px #DDDDDD;

}
input[type="text"]:hover
{
    border:1px solid #cccccc;
}
input[type="text"]:focus
{
    box-shadow:0 0 2px #FFFE00;
}


input[type="password"]{

    padding: 5px;
    border: 1px solid #DDDDDD;

    /*Applying CSS3 gradient*/
    background: -moz-linear-gradient(center top , #FFFFFF,  #EEEEEE 1px, #FFFFFF 20px);
    background: -webkit-gradient(linear, left top, left 20, from(#FFFFFF), color-stop(5%, #EEEEEE) to(#FFFFFF));


    /*Applying CSS 3radius*/
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;

    /*Applying CSS3 box shadow*/
    -moz-box-shadow: 0 0 2px #DDDDDD;
    -webkit-box-shadow: 0 0 2px #DDDDDD;
    box-shadow: 0 0 2px #DDDDDD;

}
input[type="password"]:hover
{
    border:1px solid #cccccc;
}
input[type="password"]:focus
{
    box-shadow:0 0 2px #FFFE00;
}
</style>
    </head>



<?php
include('conn.php');
session_start();
 if(!isset ($_SESSION['username']))
    {
    header('location:User_Login.php');
}
//
?>

<?php
//mag show sang information sang user nga nag login
$member_id=$_SESSION['username'];


 $ownerfname=$_POST['ownerfnameselection'];
 $ownerlname=$_POST['ownerlnameselection'];


$result5=mysql_query("select member_id from user_registration where ownerfname='$ownerfname' and ownerlname='$ownerlname'")or die(mysql_error);
$row5=mysql_fetch_array($result5);

$memid=$row5['member_id'];



// Connect to the database
$dbLink = new mysqli('localhost', 'root', 'root', 'cloud');
if(mysqli_connect_errno())
{
    die("MySQL connection failed: ". mysqli_connect_error());
}
$req=0;
// Query for a list of all existing files


$sql = "SELECT f.id, f.name,f.mime, f.size,f.created,f.ownerfname,f.ownerlname,r.request,r.ownerfname,r.ownerlname FROM file f,user_requests r
where (f.member_id ='$memid' and r.member_id='$memid') and r.request='$req'";


$result = $dbLink->query($sql);



// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0)
            {
        echo '<p><h4>Data Owner Yet to Provide Access Permission to you !!!</h4></p>
            <a href="User_Home.php">Go Back</a>';
    }
    else {
        // Print the top of a table
    echo    '<div style="position:absolute;margin-left:720px;">';
        echo '<table width="100%">
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Mime</b></th>
                    <th><b>Size (bytes)</b></th>
                    <th><b>Created</b></th>
                    <th><b>Owner FName</b></th>
                    <th><b>Owner LName</b></th>
                    <th><b>&nbsp;</b></th>

                </tr>';

        // Print each file
        while($row = $result->fetch_assoc())
                {
            echo "<tr>
                   <td>{$row['name']}</td>
                   <td>{$row['mime']}</td>
                   <td>{$row['size']}</td>
                   <td>{$row['created']}</td>
                   <td>{$row['ownerfname']}</td>
                   <td>{$row['ownerlname']}</td>
                   <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }

        // Close table
        echo '</table>
            </div>';

    }

    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}

// Close the mysql connection
$dbLink->close();
?>
</html>
