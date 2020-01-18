<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MANAGIT</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <!-- Bootstrap CDN -->
    <link href="https://fonts.googleapis.com/css?family=Acme|Indie+Flower&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <div class="jumbotron jumbotron-fluid" id="header">
        <div class="container">
            <img id="logo" src="images/nw-logo.png" alt="NumidiaLogo">
            <h1>MANAGIT</h1>
            <h3>iF YOU DONT PROGRAM YOUR LIFE, LIFE DO IT</h3>
            <?php require 'menu.php'; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <div class="col-md-9">
                    <h2>Challenge X: understand Jquery</h2> <button class="btn btn-info" id="hide">Hide test acoté</button><button class="btn btn-info" id="show">Show test acoté</button><button class="btn btn-info" id="toggle">Toggle test acoté</button>
                    <button class="btn btn-info" id="getatt">Get Attribute</button>
                    <button class="btn btn-info" id="appbtn">Appliquer la class</button>
                    <p>Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                    useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                    comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                    exact size for</p>

                    <p>Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                    useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                    comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                    exact size for</p>

                    <p>Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                    useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                    comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                    exact size for</p>

                    <p>Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                    useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                    comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                    exact size for</p>
                </div>
                <div class="col-md-3 asidediv">
                    <p id="aside_text">Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                    useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                    comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                    exact size for</p>
                </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>