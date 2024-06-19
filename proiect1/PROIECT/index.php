<!DOCTYPE HTML>
<?php 

if((isset($_COOKIE['email']))&&(isset($_COOKIE['parola'])))
{
	include 'connection.php';
	require 'procedures.php';
    $users = getUsers($pdo); //se apeleaza procedura getUsers
    foreach ($users as $user) {
        echo 'ID: ' . $user['id'] . ' - Name: ' . $user['name'] . ' - Email: ' . $user['email'] . '<br>'; 
	}
    /*include 'connection.php';
	require 'procedures.php';
 
    $email=$_COOKIE['email'];
    $pass=$_COOKIE['parola'];
    
    $sql="select * from users where email='".$email."'&& parola='".$pass."' limit 1";
    $query=mysqli_query($con,$sql)or die(mysqli_error($conn));
    $row=mysqli_fetch_array($query); 
    $result= mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
    session_start();
    $_SESSION["email"]=$_COOKIE['email'];
    $_SESSION["nume"]=$row["nume"];
    $_SESSION["parola"]=$row["parola"];
   
    header("Location:login_succes.php");
    die;
    }
	*/
    
}

?>
<html>
	<head>
		<title>Dimension by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
                <!-- register css -->
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  <link rel="stylesheet" href="assets/css/registercss.css">
	</head>
	<body class="is-preload">
            

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-gem"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1 style="color:white">PROIECT</h1>
								<p style="color: white">Ilinca, M531</p>
							</div>
						</div>
						<nav>
							<ul>
								
								
								<li><a href="#about">Who am I?</a></li>
								<li><a href="#contact">Study</a></li>
                                                                <li><a href="register.php">Sign Up</a></li>
                                                                <li><a href="login.php">Login</a></li>
								
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						
						<!-- About -->
							<article id="about">
                                                            
								<h2  style="color: white"class="major">Nice to meet you</h2>
								<span class="image main"><img src="images/dog.jpg" alt="" /></span>
                                                               
                                                        </article>
                                                

						<!-- Contact -->
							<article id="contact">
                                                            <h2 style="color: white"class="major">Universitatea <br></br>Alexandru Ioan Cuza</h2>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.168445899991!2d27.570109115492226!3d47.17413847915847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20Alexandru%20Ioan%20Cuza%20din%20Ia%C8%99i!5e0!3m2!1sro!2sro!4v1645725743826!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</article>

					</div>          

                                                   
                                
				<!--footer -->
					<footer id="footer">
                                            <p style="color: white">-2023-</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
