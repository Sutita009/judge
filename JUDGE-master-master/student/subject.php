<?php

require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>

<li><a href="subject.php">Subject</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container">
  <br><br><br><br>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Subject</p>
        <p class="title" align="right">
        <a class="button is-primary"  onclick='location.replace("subject_add.php")'>Enroll Subject</a>
        <table class="table">
          <thead>
            <tr>

              <th><abbr >Subject No.</abbr></th>
              <th><abbr >Subject Name.</abbr></th>
              <th><abbr >Detail</abbr></th>

            </tr>
          </thead>

          <tbody>
            <?php
            connectdb();
            $query = "SELECT subject_id,subject_name FROM regis  WHERE student_id='".$_SESSION['sl']."'";

            $result = mysql_query($query);
           /* $fields = mysql_fetch_array($result);
            $_SESSION['subject_id'] = $fields['subject_id'];*/

            while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "</p>";
              echo "<p class='control'>";
              echo "</form>";
              echo "<button class='button is-success''>";
              echo "<a href='event.php?subject_id=$row[0]'>";
              echo "Enter</a></td>";
              echo "</button>";
              /*echo "<button class='button is-success'>";
              echo "Enter";
              echo "</button>";
              */
            /*  echo "<form method='post' action='unroll.php'>";
              echo "<button class='button is-danger'>";
              echo "Unenroll";
              echo "</form>";
              echo "</button>";*/

              echo "</p>";
              echo "</div>";
              echo "<td>";
              echo "<button class='button is-danger'>";
              echo "<a href='unroll.php?subject_id=$row[0]'>";
              echo "Unenroll</a></td>";
              echo "</button>";
              echo "</td>";
              echo "</tr>";
            }

            ?>


          </tbody>
        </table>
      </article>
    </div>
</div> <!-- /container -->

<?php
include('footer.php');
?>
