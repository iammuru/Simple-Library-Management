<!DOCTYPE html> 
<html>
   <body style="margin-left: 20%; width: 60%;text-align: center;">
<?php 

  // Establishing Connection with Server and Selecting Database 
  $conn = mysqli_connect("localhost", "root", "", "bca-library"); 

  if($conn === false)
   die("ERROR: Could not connect. ".mysqli_connect_error());
  else
  {
    // Code for Insert Book Details 
    if(isset($_POST['insert'])) 
    {
      $accno = $_POST['accno'];
      $title = $_POST['title'];
      $author = $_POST['author'];
      $publn = $_POST['publication'];
      $edition = $_POST['edition'];
      $pages = $_POST['pages'];
      $price = $_POST['price'];
      $copies = $_POST['copies'];
      $avail = $_POST['avail'];

      if($accno != ''||$title != ''||$author != ''||$price > 0||$copies > 0||!isset($_POST['avail']))
      {
        //Construct Insert Query 
        $insqry = "INSERT INTO books(accno, title, author, publication, edition, pages, price, copies, available) ";
        $insqry = $insqry."VALUES('$accno','$title','$author','$publn','$edition','$pages','$price','$copies','$avail');"; 
        
        //Insert values to MySQL DB  
        $result=mysqli_query($conn, $insqry);
        if($result)
          echo "<br><br><p><b>Book Inserted successfully...!!</b></p>"; 
        else 
          echo "<br><br><p><b>ERROR: Could not execute the query...</b></p>";
      }
      else 
        echo "<p style=\"color:red;\"><b>Insertion Not Possible. <br/> Some Fields are Blank....!!</b></p>";
     
    }

    // Code for Issue Book 
    if(isset($_POST['issue']))
    { 
      date_default_timezone_set('Asia/Calcutta');
      $accno = $_POST['accno']; 
      $borrower = $_POST['borrower']; 
      $issuedate = date("Y/m/d"); 
      $returndate = date('Y/m/d', strtotime($issuedate.' + 15 days')); 
    
      if($accno != '' || $borrower != '')
      {
        $selqry = "SELECT accno, title FROM books WHERE accno='$accno' AND available='Yes' AND copies > 0;";

        $insqry = "INSERT INTO issued(accno, borrower, issuedate, tempreturndate, returned) ";
        $insqry = $insqry."VALUES('$accno', '$borrower', '$issuedate', '$returndate', 'No');";
        
        $updqry = "UPDATE books SET copies = IF(copies > 0, copies - 1, 0) ";
        $updqry = $updqry."WHERE accno='$accno' AND available='Yes' AND copies > 0;"; 

        $result = mysqli_query($conn, $selqry); 
     
        if($result->num_rows > 0) 
          $result = mysqli_query($conn, $insqry);
        if($result===TRUE)
        {
          $result = mysqli_query($conn, $updqry);
          if($result===TRUE)
          {
            echo "<p><b>Issue Date : ".$issuedate."</b></p>";
            echo "<p><b>Return Date : ".$returndate."</b></p>";
            echo "<br><br><p><b>Book Issued successfully...!!</b></p>"; 
          }
        }
        else 
          echo "<br><br><p><b>Book NOT Availble...</b></p>";
      }
      else
        echo "<p style=\"color:red;\"><b>Book Issue Not Possible. <br/> Some Fields are Blank....!!</b></p>";

    }

    // Code for Return Book 
    if(isset($_POST['breturn']))
    {
      date_default_timezone_set('Asia/Calcutta');
      $accno = $_POST['accno']; 
      $returndate = date("Y/m/d"); 
      
      if($accno != '')
      {
        $selqry = "SELECT accno, issuedate, tempreturndate FROM issued WHERE accno='$accno' AND returned = 'No';";
        
        $bupdqry = "UPDATE books SET copies = (copies + 1) WHERE accno='$accno';";

        $iupdqry = "UPDATE issued SET returned = 'Yes', returneddate='$returndate' ";
        $iupdqry = $iupdqry."WHERE accno='$accno' AND returned = 'No';"; 

        $result = mysqli_query($conn, $selqry); 
     
        if($result->num_rows > 0) 
        {
          $row = $result->fetch_assoc();
          echo "<br><br><p><b>Book Return Date : ".$row['issuedate']."</b></p>";
          $result = mysqli_query($conn, $bupdqry); 
          $result = mysqli_query($conn, $iupdqry); 
          if($result)
            echo "<br><br><p><b>Book Returned successfully...!!</b></p>";           
          else 
            echo "<br><br><p><b>ERROR: Could not execute the query...</b></p>";
        }
      }
      else
        echo "<p style=\"color:red;\"><b>Book Return Not Possible. <br/> Some Fields are Blank....!!</b></p>";
    }

    echo "<br><br><p><input type=\"button\" name=\"btnEntry\" Value=\"Home\" ";
    echo " onclick=\"window.location='bca-lib.php'\" /></p>";   
  } 

  // Closing Connection with Server 
  mysqli_close($conn);  

?>
</body>
</html>