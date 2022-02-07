<!DOCTYPE html> 
<html>
   <head><title>BCA Library - Insert Book</title></head>
   <body style="margin-left: 10%; width: 80%;">
   <div class="form_div">
   <div class="title">
   <h2>Enter New Book Details for Inserting into the Database</h2>
   </div>
   <form action="bcalib-db.php" method="post">
      <table border="0" width="100%"> 
      <br/><label>Enter the Book Accession Number : </label>
      <input type="text" name="accno" />
      <br/><br/><label>Enter the Book Title : </label>
      <input type="text" name="title" />
      <br/><br/><label>Enter the Author Name : </label>
      <input type="text" name="author" />
      <br/><br/><label>Enter the Publisher Name : </label>
      <input type="text" name="publication" />
      <br/><br/><label>Enter the Book Edition : </label>
      <input type="text" name="edition" />
      <br/><br/><label>Enter the no of Pages : </label>
      <input type="text" name="pages" />
      <br/><br/><label>Enter the Book Price : </label>
      <input type="text" name="price" />
      <br/><br/><label>Enter the No of Books : </label>
      <input type="text" name="copies" />
      <br/><br/><label>Select the Avalability Status :</label>
      <input type="radio" name="avail" value="Yes" checked />Yes&nbsp;
      <input type="radio" name="avail" value="No" />No

      <br/><br/><br/>
      <input class="submit" name="insert" type="submit" value="Insert">
      </table>
   </form>
   </div>
   </body>
</html>