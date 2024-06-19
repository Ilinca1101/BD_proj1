<!doctype html>


<?php
//captcha
require_once 'connection.php';
require_once 'procedures.php';  
 
$nr1=rand(1,9);
$nr2=rand(1,9);
$sum=$nr1+$nr2;
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM users WHERE email ='" . $_POST["email"] . "' limit 1";
    $result = mysqli_query($con, $sql);
    $sum1 = $_POST['cap1'];
    $sum2 = $_POST['sc'];

    if (mysqli_num_rows($result) == 1) {
        echo " Email deja existent!";
    } elseif ($sum1 == $sum2) {
        $pass1 = $_POST['parola'];
        $pass2 = $_POST['parola1'];

        if ($pass1 == $pass2) {
            try {
                insertUsers($pdo, $_POST["nume"], $_POST["email"], $_POST["parola"]);
                //apeleaza procedura  insertUsers pentru a adăuga utilizatorul în baza de date
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<h1 style='z-index:1000; color:white;'> Parolele nu coincid sau suma este introdusa gresit!</h1>";
        }
    }
}

 /* if (isset($_POST['submit']))
  {
  $sql="SELECT * FROM users WHERE email ='".$_POST["email"]."' limit 1 ";
  $result= mysqli_query($con,$sql);
    $sum1=$_POST['cap1'];
    $sum2=$_POST['sc'];
    if(mysqli_num_rows($result)==1){
        echo " Email deja existent!";
    }elseif($sum1==$sum2){ 
 $pass1=$_POST['parola'];
 $pass2=$_POST['parola1'];
 if($pass1==$pass2){
    if(isset($_POST['submit'])){
 $sql="INSERT INTO users (nume, parola, email) VALUES ('{$_POST["nume"]}','{$_POST["parola"]}', '{$_POST["email"]}')";
     $query=mysqli_query($con,$sql) or die(mysqli_error($con));
     echo "Inregistrarea a fost adaugata cu succes!";
} 
}else{ echo" <h1 style='z-index:1000; color:white;'> Parolele nu coincid sau suma este introdusa gresit!</h1> ";}
    
  }
 }
 */
?>







<html>
    
    <head>
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <link rel="stylesheet" href="assets/css/registercss.css">
<!------ Include the above in your HEAD tag ---------->
    </head>
    
    <body>
      


        <video width="320" height="240"  style=" position:absolute;
                                    top:0;
                                    left: 0;
                                    object-fit: cover;
                                    width: 100%;
                                    height: 100%;
                                    pointer-events:none ;   " autoplay  loop muted>
                                      <source src="video1.mp4" type="video/mp4">
                                    </video> 





<div class="col-md-4 col-md-offset-4" id="login" >
						<section id="inner-wrapper" class="login" style="border-radius: 15px; background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)); ">
							<article>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<div class="form-group  text-centered" >
                                                                            <p> SIGN UP</p>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"> </i></span>
											<input type="text" class="form-control" name="nume" placeholder="Name">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
											<input type="email" class="form-control"  name="email" placeholder="Email Address">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password"  name= "parola" class="form-control" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password" name="parola1" class="form-control" placeholder="Confirm Password">
										</div>
									</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <span style="color:white" class="input-group-addon"><?php echo "".$nr1."+ ".$nr2."="; ?> <input type="text" name="cap1"></span>
                                                                            <input type="hidden" name="sc" value="<?php echo $sum ?>">
                                                                        </div>
                                                                    </div>
                                                                    <input type="submit" name="submit" value="Submit">
								</form>
							</article>
						</section></div>
    </body>
    
    
    
    
</html>