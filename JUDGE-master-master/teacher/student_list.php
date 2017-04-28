<?php
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>


<li><a href="problem.php">Problems</a></li>
<li><a href="submissions.php">Submissions</a></li>
<li><a href="scoreboard.php">Scoreboard</a></li>
<li><a href="account.php">Account</a></li>
<li><a href="logout.php">Logout</a></li>
</div>
</div>
</div>

<div class="container">

  <form action="problem.php" method="post" name='form1'>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">Student List</p>
        <table class="table">
          <thead>
            <tr>
              <th><abbr >No.</abbr></th>
              <th><abbr >Student Name</abbr></th>


            </tr>
          </thead>

          <tbody>
            <?php
            connectdb();
            //$query = "SELECT student_id , student_name FROM student_id,student_name,subject WHERE student.student_id=regis.student_id and regis.subject_id=subject.subjecy_id and subject_id=$row[0] ";
            $query = "SELECT* FROM regis";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>$row[0]</td>";
              echo "<td>$row[1]</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";


              echo "</p>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }

            ?>

          </tbody>
        </table>
          <a class='button is-danger'  onClick='window.history.back();''>Back</a>;
      </article>
    </div>
  </form>
</div> <!-- /container -->
