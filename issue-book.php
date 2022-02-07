<!DOCTYPE html> 
<html>
  <head><title>BCA Library - Issue Book</title></head>
  <body style="margin-left: 10%; width: 80%;">
  <div class="form_div">
  <div class="title">
  <h2>Issue a Book from BCA Library</h2>
  </div>
  <form action="bcalib-db.php" method="post">
    <br/><label>Please Enter the Accession No of the Book to Issue : </label>
    <input type="text" name="accno" />
    <br/><br/><label>Please Enter the Borrower ID to Issue Book : </label>
    <input type="text" name="borrower" />
    <br/><br/>
    <input name="issue" type="submit" value="Issue"> 
    <?php 
      $selqry = "SELECT accno, title, author, publication, edition, copies, available FROM books WHERE available='Yes';"; 
  
      // Establishing Connection with Server and Selecting Database 
      $conn = mysqli_connect("localhost", "root", "", "bca-library"); 

      if($conn === false)
       die("ERROR: Could not connect. ".mysqli_connect_error());

      $result = mysqli_query($conn, $selqry);

      if($result === false)
        echo "<br><p><b>ERROR: Could not execute the query...</b></p><br>";

      if ($result->num_rows > 0) 
      {
       echo "<p><b>List of Books Available : </b></p><p>";
       echo "<table border='1' style=\"text-align: center;\">";
       echo "<tr><th>Acc. No</th><th>Title</th><th>Author</th><th>Publication</th>";
       echo "<th>Edition</th><th>No. of Copies</th><th>Available</th></tr>";
       while($row = $result->fetch_assoc()) 
       {
        echo "<tr><td>".$row["accno"]."</td><td>".$row["title"]."</td><td>".$row["author"];
        echo "</td><td>".$row["publication"]."</td><td>".$row["edition"]."</td><td>";
        echo $row["copies"]."</td><td>".$row["available"]."</td></tr>";
       }
       echo "</table>";
      }
   
    ?>
  </form>
  </div>
  </body>
</html>