<!DOCTYPE HTML>
<?php 
require_once 'connection.php';
session_start();
if(!isset($_SESSION["email"])){
    header("location:index.php");
    
    $sql="SELECT * FROM images ";
    $query=mysqli_query($con,$sql);
    $row= mysqli_fetch_array($query);

}
?>
<html>
	<head>
            <title ></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
                <!-- register css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  <link rel="stylesheet" href="assets/css/registercss.css">
	</head>
	<body class="is-preload">
            
 
		<!-- Wrapper -->
			<div id="wrapper">
                           <!-- ..
 
				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-gem"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1 style="color:white"> BINE AI VENIT, <?= $_SESSION["nume"]?>.</h1>
                                                                <p style="color: white">WHAT MAKES ME HAPPY? </p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">Music</a></li>
								<li><a href="#work">Traveling</a></li>
								<li><a href="#about">little stuff</a></li>
								<li><a href="#contact">Family</a></li>
                                                                <li><a href="logout.php">Logout</a></li>
                                                               
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 style="color: white"class="major">Music</h2>
                                                                <p>Without music, life would be a mistake.</p>
                                                                <canvas id="myCanvas" width="280" height="80" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML canvas tag.</canvas>

<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.font = "30px Arial";
ctx.strokeText("Friedrich Nietzsche",10,50);
</script>
                                                                <iframe width="420" height="315"
                                                                        src="https://www.youtube.com/embed/4oXgCJf4hf8">
                                                                </iframe>
<!-- buton like --> <i onclick="myFunction(this)" class="fa fa-thumbs-up" style="color:white; height: 100px; width:100px"></i> <a href="#"> <img src="share.png" width="30px" height="30px"> </a>
                                                       
                                                        </article>

						<!-- Work -->
                                                 <!-- POZE -->
							<article id="work">
								<h2  style="color: white"class="major">Traveling <?php echo $_SESSION["nume"]?></h2>
								
                                                                <p>Wherever you go become a part of you somehow. - Anita Desai</p>
                                   
                                                                                         <?php    $sql="SELECT * FROM images ";
                                                                    $query=mysqli_query($con,$sql);
                                                                      
                                                                  
                                                           
                                                           
                                                           while($row= mysqli_fetch_array($query)) 
                                                           { echo" 
                                                             <img style='width:500px; height:500px' class='image main' src=' ".$row['image']."' <br> <label style='color: white'>".$row['title']."</label> <br> "; 
                                                           //zona securizata
                                                                if($_SESSION['email']=='anca_maria@yahoo.com'){ echo" <a class='edits' style='color:white; text-decoration:none'   href='delete.php?id=".$row['id']." '>Delete</a> <br>";
                                                                echo"<a style='color:white; text-decoration:none'  class='edits' href='edit.php?id=".$row['id']."'>Edit</a> ";}
                                                                    
                                                             
                                                           
                                                           } ?>
                                                                
                                                                
                                                                
                                                                  <form method="post" action="save.php" enctype="multipart/form-data">
                                                                    <input type="hidden" name="size" value="1000000">
                                                                    <input type="file" name="image">
                                                                    <textarea  style="color:white " name="text" cols="40" rows="4" placeholder="write something about your photo"></textarea>
                                                                    <input type="submit" name="upload" value="Upload Image">
                                                                  </form>
        <!-- S -->
                                                                     <form method="post" action="login_succes.php#work">
                                                                    <input style="color:white " type="text" name="search">
                                                                    <input  type="submit" name="sub1" value="Search">
                                                                
                                                                </form>
                                                                <?php 
                                                                include 'connection.php';
                                                                if(isset($_POST['sub1'])){
                                                                    $sql3="SELECT * FROM images where title = '".$_POST['search']."'";
                                                                    $r=mysqli_query($con,$sql3);
                                                                   
                                                                       
                                                                    while($v= mysqli_fetch_array($r)){
                                                                        
                                                                        echo" <img  style='witdh:500px; height:500px'src=' ".$v['image']." ' "?>'";
                                                                ?>
                                                                     
                                                                <?php  } }?>
                                               <!-- S-->                 

                                                                
                                                                
                                                                
							</article>
                                                 <!-- POZE -->

						<!-- About -->
							<article id="about">
								<h2 style="color: white"class="major">stuff like this</h2>

                                                    <?php
                                                    
                                                   $sql2="SELECT * FROM `users` WHERE id=1";
                                                $qer= mysqli_query($con, $sql2);
                                                 $vec= mysqli_fetch_array($qer);
                                                  class info{
                                                            protected $mancare;
                                                            protected $culoare;
                                                            public function setMancare($var){
                                                                $this->mancare=$var;
                                                            }
                                                             public function setCuloare($var){
                                                                $this->culoare=$var;
                                                            }
                                                            public function showMancare(){
                                                                echo $this->mancare;
                                                            }
                                                            public function showCuloare(){
                                                                echo $this->culoare;

                                                            }
                                                        }
                                                        class info2 extends info{
                                                            protected $hobby;
                                                            protected $familie;
                                                            public function setHobby($var){
                                                                $this->hobby=$var;
                                                            }
                                                            public function setFamilie($var){
                                                                $this->familie=$var;
                                                            }
                                                            public function showHobby(){
                                                                echo $this->hobby;
                                                            }
                                                            public function showFamilie(){
                                                                echo $this->familie;
                                                            }

                                                        }

                                                      $inf= new info();
                                                      $inf1=new info2();    
                                                      $inf->setCuloare($vec['culoare']);
                                                      $inf->setMancare($vec['mancare']);
                                                      $inf1->setHobby($vec['hobby']);
                                                      $inf1->setFamilie($vec['familie']);
                                                      ?>
                                                                
                                                                  <svg width="300" height="200">
  <polygon points="100,10 40,198 190,78 10,78 160,198"
  style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;" />
Sorry, your browser does not support inline SVG.
</svg>
<br>
                                                                <label style="color:white"> <?php $inf->showCuloare() ?></label><br>
                                                                <label style="color:white"> <?php $inf1->showHobby() ?></label><br>
                                                                 <label style="color:white"> <?php $inf->showMancare() ?></label><br>
                                                                 <label style="color:white"> <?php $inf1->showFamilie() ?></label><br>
                                                                 
                                                  <video width="320" height="240" controls>
                                                      <source src="v1.mp4" type="video/mp4"> 
                                                  </video>
=					</article>
                     
						<!-- Contact -->
							<article id="contact">
								<h2 style="color: white"class="major">Family</h2>
                                                                <p>You don't choose your family. This is a gift from God to you, just as you are one to it. - Desmond Tutu</p>
								
                                                            <audio controls autoplay>
                                                            
                                                            <source src="audiov.mp3" type="audio/mpeg">
                                                          </audio>
							</article>

						
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p>...</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>
  
                        <style>
                            p{
                                color:white;
                                .edits{
                                  color:white;

                                  text-decoration: none;
                                   
                                }
                                .edits:hover{
                                    letter-spacing: 3px;
                                    color:aqua;
                                    
                                }
                            }
                        </style>
                        <script> 
                            function myFunction(x) {
                         x.classList.toggle("fa-thumbs-down");
} 
                        </script>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
                        <script>
                            function anti_right()
	{
	alert('You cannot right-click!');

	return(false);
	}
document.oncontextmenu = anti_right;




                        </script>

                       <!--  <script>
                            
                          function disabletextselect(i){
                            return false
                            }
                            function renabletextselect(){
                            return true
                            }
                            //if IE4+
                            document.onselectstart=new Function ("return false")
                            //if NS6+
                            if (window.sidebar){
                            document.onmousedown=disabletextselect
                            document.onclick=renabletextselect
                            }
                        
                        
                        </script> -->

	</body>
</html>
