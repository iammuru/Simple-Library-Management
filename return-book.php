<!DOCTYPE html> 
<html>
   <head><title>BCA Library - Return Book</title></head>
   <body style="margin-left: 10%; width: 80%;">
   <div class="form_div">
   <div class="title">
   <h2>Return a Book to BCA Library</h2>
   </div>
   <form action="bcalib-db.php" method="post">
    <br/><label>Please Enter the Accession No of the Book to Return : </label>
    <input type="text" name="accno" />
    <br/><br/>
    <input name="breturn" type="submit" value="Return"> 
    <?php 
      $selqry = "SELECT b.accno, b.title, b.author, b.publication, b.edition, i.borrower, i.issuedate, ";
      $selqry = $selqry."i.tempreturndate, i.returned FROM books as b, issued as i ";
      $selqry = $selqry."WHERE b.accno = i.accno AND i.returned = 'No';"; 
  
      // Establishing Connection with Server and Selecting Database 
      $conn = mysqli_connect("localhost", "root", "", "bca-library"); 

      if($conn === false)
       die("ERROR: Could not connect. ".mysqli_connect_error());

      $result = mysqli_query($conn, $selqry);

      if($result === false)
        echo "<br><p><b>ERROR: Could not execute the query...</b></p><br>";

      if($result->num_rows > 0) 
      {
       echo "<p><b>List of Books Available : </b></p><p>";
       echo "<table border='1' style=\"text-align: center;\">";
       echo "<tr><th>Acc. No</th><th>Title</th><th>Author</th><th>Publication</th>";
       echo "<th>Edition</th><th>Borrower ID</th><th>Issue Date</th><th>Return Date";
       echo "</th><th>Returned</th></tr>"; 
       while($row = $result->fetch_assoc()) 
       {
        echo "<tr><td>".$row["accno"]."</td><td>".$row["title"]."</td><td>".$row["author"]."</td>";
        echo "<td>".$row["publication"]."</td><td>".$row["edition"]."</td><td>".$row["borrower"];
        echo "</td><td>".$row["issuedate"]."</td><td>".$row["tempreturndate"]."</td>"; 
        echo "<td>".$row["returned"]."</td></tr>"; 
       }
       echo "</table>";
      }
   
    ?>
  </form>
   </div>
   </body>
</html>