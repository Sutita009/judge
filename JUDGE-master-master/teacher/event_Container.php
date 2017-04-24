<script language="javascript">
  function fncSubmit(strPage)
  {
    if(strPage == "student_list")
    {
      document.form1.action="student_list.php";
    }
    if(strPage == "subject_Edit")
    {
      document.form1.action="subject_Edit.php";F
    }
    if(strPage == "subject_Container")
    {
      document.form1.action="subject_Container.php";
    }
    document.form1.submit();
  }
    //Delete Subject
    function chkConfirm()
    {
      if(confirm('Confirm Delete ?')==true)
      {
        alert('Success');
      }
      else
      {
        alert('Faill');
      }
    }
    
  </script>
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
echo $_SESSION['subject_id'];
?>
<li class="active"><a href="#">Problems</a></li>

<li><a href="subject_Container.php">subject_Container</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container">

  <form action="problem.php" method="post" name='form1'>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Event</p>
        <table class="table">
          <thead>
            <tr>
              <th><abbr >No.</abbr></th>
              <th><abbr >Event</abbr></th>
              <th><abbr >Detail</abbr></th>

            </tr>
          </thead>

          <tbody>
            <?php 
            connectdb();
            $query = "SELECT event_id,event_name FROM event ";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "<button class='button is-success' >Enter</button> ";
              echo "<button class='button is-info'  onClick='JavaScript:fncSubmit('student_list')''>Student List</button> ";
              //echo "<button class='button is-warning' onClick='JavaScript:fncSubmit('subject_Edit')''>Edit Subject</button> ";
              echo "<button class='button is-danger' onClick='JavaScript:fncSubmit('subject_Container')'>Delete event</button>";
              echo "</p>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>  
        
      </article>
    </div>
  </form> 
</div> <!-- /container -->

<?php
include('footer.php');
?>
