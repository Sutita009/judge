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
    connectdb();
?>

              <li class="active"><a href="#">Subject</a><li>
              <li><a href="subject_Container.php">subject_Container</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <?php
        if(isset($_GET['success']))
          echo("<div class=\"alert alert-success\">\nCongratulations! You have solved the problem successfully.\n</div>");
    ?>
    Below is a list of available problems for you to solve.<br/><br/>
      <ul class="nav nav-list">
        <li class="nav-header">AVAILABLE PROBLEMS</li>
        <?php
          // list all the problems from the database
          $query = "SELECT * FROM problems";
            $result = mysql_query($query);
            if(mysql_num_rows($result)==0)
      echo("<li>None</li>\n"); // no problems are there
    else {
      while($row = mysql_fetch_array($result)) {
        $sql = "SELECT status FROM solve WHERE (username='".$_SESSION['username']."' AND problem_id='".$row['sl']."')";
        $res = mysql_query($sql);
        $tag = "";
        // decide the attempted or solve tag
        if(mysql_num_rows($res) !== 0) {
          $r = mysql_fetch_array($res);
          if($r['status'] == 1)
            $tag = " <span class=\"label label-warning\">Attempted</span>";
          else if($r['status'] == 2)
            $tag = " <span class=\"label label-success\">Solved</span>";
        }
        if(isset($_GET['id']) and $_GET['id']==$row['sl']) {
          $selected = $row;
          echo("<li class=\"active\"><a href=\"#\">".$row['name'].$tag."</a></li>\n");
                      } else
                        echo("<li><a href=\"index.php?id=".$row['sl']."\">".$row['name'].$tag."</a></li>\n");
                  }
    }
  ?>
      </ul>


<?php
  include('footer.php');
?>
