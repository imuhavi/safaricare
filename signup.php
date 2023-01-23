<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/ridetoDest.css">
        <link rel="stylesheet" href="css/sign-up.css">
    </head>
    <body>
        <nav>
            <?php include 'navigation.php';?>
        </nav>
        <section class="signup-form" align="center">
            <h2>Sign Up!</h2>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name"></br>
                <input type="text" name="email" placeholder="Email"></br>
                <input type="text" name="uid" placeholder="Username"></br>
                <input type="password" name="pwd" placeholder="Password"></br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"></br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Please fill in all fields!</p>";
                }
                else if($_GET["error"] == "invaliduid"){
                    echo "<p>Choose proper username</p>";
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<p>Choose proper email</p>";
                }
                else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p>Passwords don't match!</p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, try again!</p>";
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p>Username already taken</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p>You have signed up</p>";
                }
            }
        ?>
        </section>

        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>