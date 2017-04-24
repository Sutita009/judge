<?php
/*
 * Codejudge
 * NANTIPAT TULLWATTANA SOFTWARE ENGINEER
 * Licensed under MIT License.
 *
 * The main page that lists all the problem
 */
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
if(isset($_POST['action'])) {
  $username = array_key_exists('username', $_POST) ? mysql_real_escape_string(trim($_POST['username'])) : "";
  if($_POST['action']=='subject_add') {

    $SubjectNo= array_key_exists('SubjectNo', $_POST) ? mysql_real_escape_string(trim($_POST['SubjectNo'])) : "";
    $SubjectName= array_key_exists('SubjectName', $_POST) ? mysql_real_escape_string(trim($_POST['SubjectName'])) : "";
    if(trim($SubjectNo) == "" and trim( $SubjectName) == "") {
        header("Location: subject_add.php?derror=1"); // empty entry
      } else {
        connectdb();
        $query = "SELECT salt,hash FROM users WHERE username='".$username."'";
        $result = mysql_query($query);


        $sql="INSERT INTO `subject` ( `subject_id` , `subject_name` , `Teacher_id`) VALUES ('".$SubjectNo."', '". $SubjectName."','".$_SESSION['sl']."')";
        mysql_query($sql);
        header("Location: subject_Container.php");
        
      }
    }
  }


  ?>

  <li><a href="subject_Container.php">subject_Container</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>
<?php
if(isset($_GET['logout']))
  echo("<div class=\"alert alert-info\">\nYou have logged out successfully!\n</div>");
else if(isset($_GET['error']))
  echo("<div class=\"alert alert-error\">\nIncorrect username or password!\n</div>");
else if(isset($_GET['registered']))
  echo("<div class=\"alert alert-success\">\nYou have been registered successfully! Login to continue.\n</div>");
else if(isset($_GET['exists']))
  echo("<div class=\"alert alert-error\">\nUser already exists! Please select a different username.\n</div>");
else if(isset($_GET['derror']))
  echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");
?>
<div class="container">
  <br><br><br><br>
  <div class="tile is-parent">
    <article class="tile is-child notification is-info">
      <p class="title">Add Subject</p>
      <form method="post" action="subject_add.php">
        <input type="hidden" name="action" value="subject_add"/>
        <label class="label">Subject No</label>  
        <p class="control">
          <input class="input is-success" name='SubjectNo' type="text" placeholder="" >
        </p>
        <label class="label">Subject Name</label>
        <p class="control has-icon has-icon-right">
          <input class="input is-success" name='SubjectName' type="text" placeholder="" >
          <span class="icon is-small">
            <i class="fa fa-check"></i>
          </span>
        </p>
        <div class="control is-grouped">
          <p class="control">

            <input class="button is-primary" type="submit" name="submit" value="Submit"/>
          </p>
          <p class="control">
          <a class='button is-danger'  onClick='window.history.back();''>Back</a>
          </p>
        </div>
      </form>
    </div> <!-- /container -->

    <?php
    include('footer.php');
    ?>
