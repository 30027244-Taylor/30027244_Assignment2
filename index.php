<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/custom.css" type="text/css">


        <title>SCP Database</title>
    </head>

    <body class="text-dark bg-white">
        <?php include "app/connection.php" ?>

        <!-- Menu Row -->
        <div class="navbar navbar-expand-md navbar-dark bg-dark">         
            <a class="navbar-brand" href="index.php">
                <img src="images/logo-sm.png" width="30" height="30" class="d-inline-block align-top" alt="">
            SCP Database
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHamburger" aria-controls="navbarHamburger" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>        

            <div class="collapse navbar-collapse" id="navbarHamburger">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- Run php loop through db and display subject item numbers here -->
                    <?php foreach($result as $page): ?>
                        <li class="nav-item active">
                            <a href="index.php?page='<?php echo $page['item_number']; ?>'" class="nav-link"><?php echo $page['item_number']; ?></a>
                        </li>
                    <?php endforeach; ?>
            
                    <li class="nav-item active">
                        <a href="form.php" class="nav-link">Enter New Subject</a>
                    </li>
            
                </ul>    
            </div>
        </div>   

        <div class="container bg-light border">
            <!-- Database content -->
            <div class="row">
                <div class="col">
                    <?php
                        if(isset($_GET['page']))
                        {
                            // Remove single quotes from page get value
                            $item_number = trim($_GET['page'], "'");

                            // Run sql command to select record based on get value
                            $record = $connection->query("select * from subject where item_number='$item_number'") or die($connection->error);

                            // Convert $record into an array for us to echo out the individual fields on screen
                            $row = $record->fetch_assoc();

                            // Create variables that hold data from all table fields
                            $object_class = $row['object_class'];
                            $subject_image = $row['subject_image'];

                            
                            $procedures = $row['procedures'];                        
                            $description = $row['description'];
                            
                            $h1 = $row['h1'];
                            $extra1 = $row['extra1'];
                            $h2 = $row['h2'];
                            $extra2 = $row['extra2'];
                            $h3 = $row['h3'];
                            $extra3 = $row['extra3'];

                            // Variables to hold Delete url string
                            $id = $row['id'];
                            $delete = "app/connection.php?delete=" . $id;

                            // Display information on screen
                            echo nl2br("
                            
                                <h1>{$item_number}</h1>                                
                                <h3>Object Class: {$object_class}</h3>

                                <hr class='bg-dark' style='width: 100%;'>
                                <p><img src='{$subject_image}' class='img-fluid shadow-lg rounded mx-auto d-block'></p>
                                <hr class='bg-dark' style='width: 100%;'>

                                <h3>Procedures:</h3>
                                <p>{$procedures}</p>
                                <h3>Description:</h3>
                                <p>{$description}</p>

                                <h3>{$h1}</h3>
                                <p>{$extra1}</p>
                                <h3>{$h2}</h3>
                                <p>{$extra2}</p>
                                <h3>{$h3}</h3>
                                <p>{$extra3}</p>

                            ");

                            //Display delete button
                            echo ("
                            
                                <p>
                                <a href='{$delete}' class='btn btn-danger' data-toggle='tooltip'data-placement='right' title='Warning! This is permanent deletion'>Delete</a>
                                </p>
                            
                            ");
                        }
                        else
                        {
                            // If this is the first time this page has been accessed, display content below
                            echo nl2br("

                                <div class='wrap'>

                                    <p><img class='img-fluid mx-auto d-block' src='images/logo.png' alt='SCP Foundation Logo'></p>

                                    <hr class='bg-dark' style='width: 100%;'>

                                    <h1 class='text-center'>Subject Database</h1>

                                    <hr class='bg-dark' style='width: 100%;'>

                                    <p class='text-center'>Welcome Agent. Use the links above to view subject files or add a new subject to the database.</p>

                                </div>

                            ");
                        }

                    ?>
                </div>
                
            </div>
        </div>

        <footer class='footer mt-auto py-3 bg-dark text-light'>
            <div>&#169; Taylor Hollander</div>
        </footer>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>