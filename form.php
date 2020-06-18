<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                            <a href="index.php?page='<?php echo $page['item_number'];?>'" class="nav-link"><?php echo $page['item_number'];?></a>
                        </li>
                    <?php endforeach; ?>
            
                    <li class="nav-item active">
                        <a href="form.php" class="nav-link">Enter New Subject</a>
                    </li>
            
                </ul>    
            </div>
        </div>
        <div class="container bg-light text-dark border">

            <br><br>
            <h1>SCP Database Form</h1>
            <br>
            <h3>Enter new subject information using the form below.</h3>

            <form class="form-group" method="post" action="app/connection.php">

                <br>
                <hr class="mx-auto d-block bg-success">
                <br>

                <label>Item Number: *</label>
                <br>
                <input type="text" class="form-control" name="item_number" placeholder="Use the format 'SCPXXX'" aria-describedby="itemNumberHelpBlock" id="item" onKeyUp="checkItem()" required>
                <small class="form-text text-muted" id="itemNumberHelpBlock">Max. 20 characters.</small>
                <!-- Warning if user inputs more than 20 characters -->
                <span id="warning" class="alert-danger" role="alert"></span>
                <br><br>

                <label for="formControlSelect">Object Class: *</label>
                <br>
                <select class="form-control" id="formControlSelect" name="object_class" required>
                    <option selected value="">Select a class...</option>
                    <option value="Safe">Safe</option>
                    <option value="Euclid">Euclid</option>
                    <option value="Keter">Keter</option>
                    <option value="Thaumiel">Thaumiel</option>
                    <option value="Neutralised">Neutralised</option>
                </select>
                <br><br>

                <label>Subject Image:</label>
                <br>
                <input type="text" class="form-control" name="subject_image" placeholder="Use the format 'images/image.(jpg, png)'">
                <br><br>

                <label>Procedures: *</label>
                <br>
                <textarea class="form-control" name="procedures" rows="5" placeholder="Separate paragraphs with a new line" id="proc" onKeyUp="checkProc()" required></textarea>
                <!-- Warning if user inputs more than 10,000 characters -->
                <span id="warning2" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Description: *</label>
                <br>
                <textarea class="form-control" name="description" rows="5" placeholder="Separate paragraphs with a new line" id="desc" onKeyUp="checkDesc()" required></textarea>
                <!-- Warning if user inputs more than 10,000 characters -->
                <span id="warning3" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Heading:</label>
                <br>
                <input type="text" class="form-control" name="h1" id="head1" onKeyUp="checkHead1()">
                <!-- Warning if user inputs more than 50 characters -->
                <span id="warning4" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Extra Information:</label>
                <br>
                <textarea class="form-control" name="extra1" rows="5" id="extra1" onKeyUp="checkExtra1()"></textarea>
                <!-- Warning if user inputs more than 10,000 characters -->
                <span id="warning7" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Heading:</label>
                <br>
                <input type="text" class="form-control" name="h2" id="head2" onKeyUp="checkHead2()">
                <!-- Warning if user inputs more than 50 characters -->
                <span id="warning5" class="alert-danger" role="alert"></span>
                <br><br>
                
                <label>Extra Information:</label>
                <br>
                <textarea class="form-control" name="extra2" rows="5" id="extra2" onKeyUp="checkExtra2()"></textarea>
                <!-- Warning if user inputs more than 10,000 characters -->
                <span id="warning8" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Heading:</label>
                <br>
                <input type="text" class="form-control" name="h3" id="head3" onKeyUp="checkHead3()">
                <!-- Warning if user inputs more than 50 characters -->
                <span id="warning6" class="alert-danger" role="alert"></span>
                <br><br>

                <label>Extra Information:</label>
                <br>
                <textarea class="form-control" name="extra3" rows="5" id="extra3" onKeyUp="checkExtra3()"></textarea>
                <!-- Warning if user inputs more than 10,000 characters -->
                <span id="warning9" class="alert-danger" role="alert"></span>
                <br>
                <hr class="mx-auto d-block bg-success">
                <br>
                
                <input type="submit" class="btn btn-success mx-auto d-block" name="submit" value="Submit Subject Data">

            </form>
        </div>

        <footer class='footer mt-auto py-3 bg-dark text-light'>
            <div>&#169; Taylor Hollander</div>
        </footer>

        <!-- Error message functions for input character limits -->
        <script>
            function checkItem() {
                stringLength = document.getElementById('item').value.length;
                if (stringLength > 20) {
                    document.getElementById('warning').innerText = "Warning: Maximum allowed characters are 20"
                } else {
                    document.getElementById('warning').innerText = ""
                }
            }

            function checkProc() {
                stringLength = document.getElementById('proc').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning2').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning2').innerText = ""
                }
            }

            function checkDesc() {
                stringLength = document.getElementById('desc').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning3').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning3').innerText = ""
                }
            }

            function checkHead1() {
                stringLength = document.getElementById('head1').value.length;
                if (stringLength > 50) {
                    document.getElementById('warning4').innerText = "Warning: Maximum allowed characters are 50"
                } else {
                    document.getElementById('warning4').innerText = ""
                }
            }

            function checkHead2() {
                stringLength = document.getElementById('head2').value.length;
                if (stringLength > 50) {
                    document.getElementById('warning5').innerText = "Warning: Maximum allowed characters are 50"
                } else {
                    document.getElementById('warning5').innerText = ""
                }
            }

            function checkHead3() {
                stringLength = document.getElementById('head3').value.length;
                if (stringLength > 50) {
                    document.getElementById('warning6').innerText = "Warning: Maximum allowed characters are 50"
                } else {
                    document.getElementById('warning6').innerText = ""
                }
            }

            function checkExtra1() {
                stringLength = document.getElementById('extra1').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning7').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning7').innerText = ""
                }
            }

            function checkExtra2() {
                stringLength = document.getElementById('extra2').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning8').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning8').innerText = ""
                }
            }

            function checkExtra3() {
                stringLength = document.getElementById('extra3').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning9').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning9').innerText = ""
                }
            }
        </script>
        <!-- <script>
            function checkProc() {
                stringLength = document.getElementById('proc').value.length;
                if (stringLength > 10000) {
                    document.getElementById('warning2').innerText = "Warning: Maximum allowed characters are 10,000"
                } else {
                    document.getElementById('warning2').innerText = ""
                }
            }
        </script> -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>