 <body style="background-color:lightgray;">

<?php 
require "connection.php";

if(isset($_POST['email'])){
    $email=$_POST['email'];
    $pass=$_POST['parola'];
    
    $sql="select * from users where email='".$email."'&& parola='".$pass."' limit 1";
    $query=mysqli_query($con,$sql)or die(mysqli_error($conn));
    $row=mysqli_fetch_array($query); 
    $result= mysqli_query($con,$sql);
    //remember me
    if(mysqli_num_rows($result)==1){
         if(isset($_POST['rem'])){
           setcookie('email',$_POST['email'],time()+60*60*24*30);
            setcookie('parola',$_POST['parola'],time()+60*60*24*30);
            echo "Remember me cookie set!";
        }
        // sesiuni
    session_start();
    $_SESSION["email"]=$_POST['email'];
    $_SESSION["nume"]=$row["nume"];
    $_SESSION["parola"]=$row["parola"];
    $_SESSION['id']=$row['id'];
    
    
    if($_SESSION["parola"]=="abc" && $_SESSION["nume"]=="admin"){
        header("Location:login_admin.php");
        die;
    }else{
    header("Location:login_succes.php");
    die;
    }
    
}else
    {
        echo "Wrong username or password";
        exit();
    }
}
      
?>
<head>
    <link rel="stylesheet" href="assets/css/logincss.css";>
</head>



<div class="form-bg">

    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <div class="form-container">
                    
                        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <h3 class="title">User Login</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="email" name="email" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" type="password" name="parola" placeholder="Password">
                        </div>
                        <span class="forgot-pass"> Remember me:<input type="checkbox" name="rem" value="1"></span>
                        <button class="btn signin" type="submit" >Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
        
        </body>