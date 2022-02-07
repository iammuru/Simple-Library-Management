<!DOCTYPE html> 
<html>
   <body style="margin-left: 20%; width: 60%;text-align: center; background-color: #ccc;">
      <div style="text-align: center"> 
      <p> <h3>Welcome to Web Applications Lab </h3>
      <h4>Program Part C3 - BCA Department Library </h4> 
      <?php
        date_default_timezone_set('Asia/Calcutta');
        echo "Today is ".date('F j').', '.date('Y').'<br/>';
      ?> 
      </p> </div> 
      <form id="form1" method="post"> 
	        <br/><hr/><br/>To Add a New Book - Click Here<br/><br/> 
          <input type="button" name="btnInsert" Value="Insert Book" 
            onclick="window.location='insert-book.php'" />  
          <br/><br/><hr/><br/>To Issue a Book - Click Here<br/><br/> 
          <input type="button" name="btnIssue" Value="Issue Book" 
            onclick="window.location='issue-book.php'" />  
	        <br/><br/><hr/><br/>To Return a Book - Click Here<br/><br/> 
          <input type="button" name="btnReturn" Value="Return Book" 
            onclick="window.location='return-book.php'" /> 
      </form>
   </body>
</html>
