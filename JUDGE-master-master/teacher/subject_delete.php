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
  <form action="subject_Container.php" method="post" name='form1'>
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

            $subject_id = $_GET['subject_id'];
            $query = "DELETE FROM subject WHERE subject_id ='$subject_id' and  Teacher_id='".$_SESSION['sl']."'";
            $query1 = "SELECT subject_id,subject_name FROM subject  WHERE Teacher_id='".$_SESSION['sl']."'";
            $result = mysql_query($query);
            $result1 = mysql_query($query1);
            /*$fields = mysql_fetch_array($result);
            $_SESSION['subject_id'] = $fields['subject_id'];*/
          //  echo $query;
          while($row = mysql_fetch_array($result1,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "<button class='button is-success''>";
              echo "<a href='event_Container.php?subject_id=$row[0]'>";
              echo "Enter</a></td>";
              echo "</button>";

              echo "<td>";
              echo "<button class='button is-warning''>";
              echo "<a href='student_list.php?subject_id=$row[0]'>";
              echo "Student List</a></td>";
              echo "</button>";

              echo "<td>";
              echo "<button class='button is-warning''>";
              echo "<a href='subject_edit.php?subject_id=$row[0]'>";
              echo "Edit Subject</a></td>";

              echo "<td>";
              echo "<button class='button is-danger''>";
              echo "<a href='subject_delete.php?subject_id=$row[0]'>";
              echo "Delete Subject</a></td>";
              echo "</p>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }

            ?>
            <Meta http-equiv="refresh"content="1;URL=subject_Container.php">
          </tbody>
        </table>
      </article>
    </div>
  </form>
</div> <!-- /container -->

<?php
include('footer.php');
?>
