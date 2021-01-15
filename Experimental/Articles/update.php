<?php 
    include "../includes/header.php";
?>

<body>
   <?php include "../includes/navigation.php" ?>

   <body>
      <div class="content">

      <h1>CRUD Test Site </h1>
      <h2>Update Data</h2>

      <?php
         include "config.php"; // Connect to database script
         include "functions.php";
         updateRow();
      ?>


      <div class = form>
         <form method=post action=update.php>
         Article: 
         <select name="id" id="id">
            <!-- <option value="id" selected="selected">Select User</option> -->
            <?php
               showId();
            ?>
         </select>
         <input type="submit" name="submit_id" value="view">
      </div>

      <br>
      <div class="form">
         <?php
            showIdData();
         ?>
         <form method="post" action="update.php">
         Title:<br>
         <input type="text" name="title" value=<?php echo showIdData($title) // how do i get title var ;-; ?> >
         <br>
         Author:<br>
         <input type="text" name="author" <?php echo showIdData().$author; ?>>
         <br>
         Content:<br>
         <textarea type="text" name="content" rows="1" cols="35">
         </textarea>
         <br>
         <br><br>
         <input type="submit" name="save" value="submit">
      </div>
      

   </div>  
</body>

</html>
