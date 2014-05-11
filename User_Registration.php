<phpcode>    
   <?php
require 'conn.php';
include 'C:\wamp\www\wordpress\wp-content\themes\curation\header.php';

   echo "<div class='container'>
	<section id='content'>
<form method='post' action='User_info_insert.php'>
    <h1>User Registration</h1>

    <div>
       <input placeholder='UserName' type='text' name='UserName' size='20'/>
    </div>
    <div>
        <input placeholder='Password' type='password' name='Password'/>
    </div>";
          $query = 'SELECT distinct firstname from members';

          $res = mysql_query($query);
    echo "<div>
       <select name = 'ownerfname' id='owner_name' size='1' style='width: 280px;'>

           <option>Owner FName</option>";
            while (($row = mysql_fetch_array($res)))
        {
        echo "<option value='{$row["firstname"]}'>
          {$row['firstname']}
          </option>";

        }

    echo   "</select>
    </div>";

      $query2 = 'SELECT distinct lastname from members';

          $res2 = mysql_query($query2);
   echo  "<div>
       <br><select name = 'ownerlname' id='owner_name' style='width: 280px;'>

           <option>Owner LName</option>";
            while (($row2 = mysql_fetch_array($res2)))
        {
        echo "<option value='{$row2["lastname"]}'>
          {$row2['lastname']}
          </option>";

        }

     echo "</select>
    </div>
    <div>
    <input type='submit' name='submit' value='Submit'/>
   
    </div>
</form>
        </section>
    </div> ";

?>
    
</phpcode> 