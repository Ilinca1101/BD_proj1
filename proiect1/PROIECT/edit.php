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
        
							<article>
                                                             <center>
                                                            <h2  style="color: white" class="major" class="work">Traveling <?php echo $_SESSION["nume"]?></h2>
                                                               
								<?php
//include connection file
include 'connection.php';
if(!isset($_POST["submit"])){
    $sql="SELECT * FROM images WHERE ID='{$_GET['id']}'";
    $result=mysqli_query($con,$sql);
    $record=mysqli_fetch_array($result);
}else{
    $sql2="SELECT * FROM images WHERE ID='{$_POST['id']}'";
    $result2=mysqli_query($con,$sql2);
    $rec=mysqli_fetch_array($result2);
    $title=$_POST['title'];
    if(isset($_POST['title'])){
        $target="./images/".basename($_FILES['image']['name']);
    }else{
        $target=$rec['image'];
        //echo $target;
    }
    $sql1="UPDATE images SET title='{$title}', image='{$target}' WHERE id='{$_POST['id']}'";
    mysqli_query($con, $sql1) or die(mysqli_error($con));
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    header('location:login_succes.php#work');
}
?>
<h1>Editati inregistrarea:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
Titlu:<br/><input type="text" name="title" value="<?php echo $record['title'];?>"/><br/>
Image: <br/><input type="file" name="image" value="<?php echo $record['image'];?>"/><br/>
<img src="<?php echo $record['image'];?>"><br/>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="submit" name="submit" value="Edit"/>
</form>

                                                                </center> 
                                                                </article>
