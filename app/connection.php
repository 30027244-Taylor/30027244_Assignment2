<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php

    //Database credentials
    $user = "a3002724_agent";
    $pw = "Toiohomai1234";
    $db = "a3002724_scp";

    //Database connection object (address, user, pw and db)
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

    //Create variable that stores all records from our database
    $result = $connection->query("select * from subject") or die($connection->error());

    // First check if form has been submitted with data
    if(isset($_POST['submit']))
    {
        // Create variables from our posted form values
        $item_number = $_POST['item_number'];
        $object_class = $_POST['object_class'];
        $subject_image = $_POST['subject_image'];
        
        // Addslashes enables apostrophes when submitting information into the form
        $procedures = addslashes($_POST['procedures']);        
        $description = addslashes($_POST['description']);
        
        $h1 = $_POST['h1'];
        $extra1 = addslashes($_POST['extra1']);
        $h2 = $_POST['h2'];
        $extra2 = addslashes($_POST['extra2']);
        $h3 = $_POST['h3'];
        $extra3 = addslashes($_POST['extra3']);

        // Create an insert command
        $sql = "insert into subject(item_number, object_class, subject_image, procedures, description, h1, extra1, h2, extra2, h3, extra3)
        values('$item_number', '$object_class', '$subject_image', '$procedures', '$description', '$h1', '$extra1', '$h2', '$extra2', '$h3', '$extra3')";

        // Display success or error message on screen
        if($connection->query($sql) === TRUE)
        {
            echo nl2br("

                <h1 class='text-center'>Record added successfully</h1>
                <p class='text-center'><a href='../index.php' class='btn btn-dark'>Back to home</a></p>

            ");
        }
        else
        {
            echo nl2br("            
                <h1 class='text-center'>Error submitting data...</h1>
                <p{$connection->error()} class='text-center'></p>
                <p class='text-center'><a href='../index.php' class='btn btn-dark'>Back to home</p>
            "); 
        }
    }

    // Checks if Delete button was clicked
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];

        // Create delete sql command
        $del = "delete from subject where id=$id";

        // Run the command and then display appropriate success or error messages
        if($connection->query($del) === TRUE)
        {
            echo nl2br("

            <h1 class='text-center'>Record has been deleted.</h1>
            <p class='text-center'><a href='../index.php' class='btn btn-dark'>Back to Home</a></p>
            
            ");
        }
        else
        {
            echo nl2br("
            
            <h1 class='text-center'>There was an error deleting this record...</h1>
            <p{$connection->error()} class='text-center'></p>
            <p class='text-center'><a href='../index.php' class='btn btn-dark'>Back to Home</a></p>
            
            ");
        }
    }

?>