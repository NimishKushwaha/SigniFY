<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signify</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/welcomeStyle.css" >
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Signify | </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php" style="font-family: Times New Roman;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses.html" style="font-family: Times New Roman;">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resource.html" style="font-family: Times New Roman;">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quiz.html" style="font-family: Times New Roman;">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="miscellaneous.php" style="font-family: Times New Roman;">Miscellaneous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="score_board.php" style="font-family: Times New Roman;">Score Board</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?> |</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <hr>
        <h1 style="font-family: Times New Roman;">Welcome to <b style="font-family: 'Qwigley', cursive;">Signify</b></h1><br>
        <section class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="Styles/img1.jpeg" alt="" /></div>
                            <div class="content">
								<h2>Sign-Speech-Text</h2>
								<p>Should someone who is hard of hearing miss exciting presentations, significant news, 
                                    and more? Don't we want them to have fun, be able to communicate with us, and vice versa?</p>
                                    <form action="execute_script.php" method="post">
                                        <button type="submit" name="startButton">Start Learning !</button>
                                    </form>
							</div>
						</section>
            </div>
        </section>
        
    </div>
    <div class="container mt-4">
        <section class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="Styles/img2.jpg" alt="" /></div>
                            <div class="content">
								<h2>Aud-Book</h2>
								<p>Nobody should ever have to decide between their love of books and their ability to see. 
                                    Can a book make the blind view the most beautiful sights and alleviate the most pain? 
                                    Shall we take a look at one now?</p>
                                    <form action="execute_script.php" method="post">
                                        <a href="http://127.0.0.1:5001/" target="_blank">
                                            <button type="button" name="startButton1">Start Listening !</button>
                                        </a>
                                    </form>
							</div>
						</section>
            </div>
        </section>
    </div>

    <div class="container mt-4">
        <section class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="Styles/img1.jpeg" alt="" /></div>
                            <div class="content">
								<h2>Sign-Speech-Text</h2>
								<p>Should someone who is hard of hearing miss exciting presentations, significant news, 
                                    and more? Don't we want them to have fun, be able to communicate with us, and vice versa?</p>
                                    
                                        <a href="notes.html"><button type="submit" name="startButton">Start notes !</button></a>
                                    </form>
							</div>
						</section>
            </div>
        </section>
        
    </div>
    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
