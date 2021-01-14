<?php
include "config.php";

// ---------------------------------------------------------------------------
// DISPLAY ALL DATA 
// ---------------------------------------------------------------------------
function showAllData() {
// takes data from a database and displays certian rows based on the 'id' selected
   global $connection; // alllows $connection to be used across config.php and functions.php
   $query = "SELECT * FROM articles";

   $result = mysqli_query($connection, $query);// sends sql query to database 

   if(!$result){
      die("query failed" . mysqli_error($connection));    // If the result fails, stop it (die) and send a error message 
   }

   while($row = mysqli_fetch_assoc($result)){   // $row = fetch assosiative array of $result = query of 'SELECT * FROM users"
                                                // the array is a row of data - this is looped until the database returns no more rows 
      $id = $row['id'];                         // creates a variable called 'id' that finds data from array with the referance name 'id' (assosative array)
      $title = $row['title'];  
      $author = $row['author'];
      $content = $row['content'];
      $date_created = $row['date_created'];
      
      echo $id . " ";
      echo $title . " ";
      echo $author . " ";
      echo $content . " ";
      echo $date_created . " ";
      echo "<br>";

   } 
}

// ---------------------------------------------------------------------------
// DISPLAY ID'S
// ---------------------------------------------------------------------------
function showId() {
   // takes data from a database and displays certian rows based on the 'id' selected
      global $connection; // alllows $connection to be used across config.php and functions.php
      $query = "SELECT * FROM Contacts";
   
      $result = mysqli_query($connection, $query);// sends sql query to database 
   
      if(!$result){
         die("query failed" . mysqli_error($connection));    // If the result fails, stop it (die) and send a error message 
      }
   
      while($row = mysqli_fetch_assoc($result)){   // $row = fetch assosiative array of $result = query of 'SELECT * FROM users"
                                                   // the array is a row of data - this is looped until the database returns no more rows 
         $id = $row['id'];                         // creates a variable called 'id' that finds data from array with the referance name 'id' (assosative array)

         echo '<option>' . $id . '</option>';
      } 
   }

// ---------------------------------------------------------------------------
// DISPLAY SPECIFIC ROW
// ---------------------------------------------------------------------------
function showIdData() {

   // $id = $_POST['id'];
   // echo id;
global $connection; // alllows $connection to be used across config.php and functions.php
   if(isset($_POST['submit_id']))  // if the submit value 'save' is selected (is submit button pressed)
   {
         
      $id = $_POST['id'];

      $query = "SELECT * FROM Contacts WHERE id = '$id' ";
   
      $result = mysqli_query($connection, $query);// sends sql query to database 
   
      if(!$result){
         die("query failed" . mysqli_error($connection));    // If the result fails, stop it (die) and send a error message 
      }
   
      while($row = mysqli_fetch_assoc($result)){   // $row = fetch assosiative array of $result = query of 'SELECT * FROM users"
                                                   // the array is a row of data - this is looped until the database returns no more rows 
         $id = $row['id'];                        
         $title = $row['title'];  
         $author = $row['author'];
         $content = $row['content'];
         $date_created = $row['date_created'];
         
         echo $id . " ";
         echo $first_name . " ";
         echo $last_name . " ";
         echo $city_name . " ";
         echo $email . " ";
         echo "<br>";
   
      } 
   }
}



// ---------------------------------------------------------------------------
// ADD NEW ROW
// ---------------------------------------------------------------------------
function createRow() {
   global $connection; // alllows $connection to be used across config.php and functions.php

   if(isset($_POST['save']))  // if the submit value 'save' is selected (is submit button pressed)
   {
      // Link php vars to sql attributes
      echo "stage 1 </br>";
                      
      $title = $_POST['title'];  
      $author = $_POST['author'];
      $content = $_POST['content'];


      // prevent sql injection
      $title = mysqli_real_escape_string($connection, $title);
      $author = mysqli_real_escape_string($connection, $author);
      $content = mysqli_real_escape_string($connection, $content);
    
      // Create query to input new data
      $query = "INSERT INTO articles(title, author, content) ";
      $query .= "VALUES ('$title', '$author', '$content')"; // .= concatonates (adds on the end) onto existing values (same as += in js)


      echo $query;
      // run query mysql_query (login / query)
      $result = mysqli_query($connection, $query);// sends sql query to database 

      // If the query fails, return the error
      if(!$result){
         die("query failed" . mysqli_error($connection));
      }
   }
}


// ---------------------------------------------------------------------------
// UPDATE ROW
// ---------------------------------------------------------------------------

function updateRow() {
   global $connection; // alllows $connection to be used across db.php and functions.php

   if(isset($_POST['save']))  // if the submit value 'save' is selected (is submit button pressed)
   {
      $id = $row['id'];                        
      $title = $row['title'];  
      $author = $row['author'];
      $content = $row['content'];
      $date_created = $row['date_created'];

      $first_name = mysqli_real_escape_string($connection, $first_name);
      $last_name = mysqli_real_escape_string($connection, $last_name);
      $city_name = mysqli_real_escape_string($connection, $city_name);
      $email = mysqli_real_escape_string($connection, $email);


      $query = "INSERT INTO Contacts(first_name, last_name, city_name, email) ";
      $query .= "VALUES ('$first_name', '$last_name', '$city_name', '$email')"; // .= concatonates (adds on the end) onto existing values (same as += in js)

      echo $query;

      $result = mysqli_query($connection, $query);// sends sql query to database 

      if(!$result){
         die("query failed" . mysqli_error($connection));
      }
   }
}

// ---------------------------------------------------------------------------
// DELETE ROW
// ---------------------------------------------------------------------------
function deleteRows() {
   global $connection; // alllows $connection to be used across db.php and functions.php

   $id = $_POST['id'];

   // building sql query 
   $query = "DELETE FROM users  ";
   $query .= "WHERE id = '$id' ";

   echo $query;

   $result = mysqli_query($connection, $query);
   if(!$result) {
      die("Query failed" . mysqli_error($connection));
   }
}
