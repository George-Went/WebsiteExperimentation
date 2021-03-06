
<?php 
    include "includes/header.php";
?>

<body>

    <?php
        include "includes/navigation.php"; 
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            // Search Engine Script
            if(isset($_POST['submit']))
            {
                echo $_POST['search'];

                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

                $search_query = mysqli_query($connection, $query);
                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                // Displaying the search engine result as a blog page
                if($count == 0){
                    echo "<h1>No Result</h1>";
                }
                else {
                    echo "Some Result";
                    echo "search results";
                
                    $select_all_posts_query = mysqli_query($connection,$query); // send query to mysql server
                        
                    //this loops through each post and creates a html title tag with the posts name
                    while($row = mysqli_fetch_assoc($select_all_posts_query)) { // fetches results and puts them in a assosative array
                       $post_title = $row['post_title']; // creates a variable called 'post title with the value of the post_title query
                       $post_author = $row['post_author'];
                       $post_date = $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_content = $row['post_content'];         
                    }
                    
                    ?>
                        <h1 class="page-header">
                            Article Posts
                            <small>Stuff</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p> Posted on <?php echo $post_date; ?></p>
                        <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More</a>

                        <hr>

                        <!-- Pager -->
                        <ul class="pager">
                            <li class="previous">
                                <a href="#">&larr; Older</a>
                            </li>
                            <li class="next">
                                <a href="#">Newer &rarr;</a>
                            </li>
                        </ul>

                    </div>
                    <?php
                }
            }
            ?>
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php
            include "includes/footer.php";
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

