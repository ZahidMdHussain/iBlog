<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/update_blogs.css">
    <title>iBlog</title>
    <?php include 'connection.php'; ?>
</head>

<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <span>iBlog</span>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <form action="search.php" method="GET">
                <input class="form-input" type="text" name="find" placeholder="Search..">
                <input class="btn" type="submit" value="Search" name="query">
            </form>
        </div>
    </nav>
    <hr>

    <div class="update-form font3">
        <div class="max-width-2 m-auto">
            <h2>Update Blog..</h2>
        </div>
        <form action="" method="POST">


            <?php
            $ids=$_GET['id'];
            $showquery="select * from blogger where id={$ids}";
            $showdata=mysqli_query($con,$showquery);
            $arrdata=mysqli_fetch_array($showdata);

            if(isset($_POST['submit'])){
            $idupdate=$_GET['id'];
            $name=$_POST['name'];
            $dob=date('Y-m-d',strtotime($_POST['date']));
            $heading=$_POST['heading'];
            $blog=$_POST['content'];

            $query="UPDATE blogger SET author='$name',publish='$dob',title='$heading',content='$blog' WHERE id=$idupdate";
            
            $res=mysqli_query($con,$query);
            if($res){
            ?>
            <script>
                alert("Data Updated...");
            </script>
            <?php
            }else{
            ?>
            <script>
                alert("Data Not Updated...");
            </script>
            <?php
            }
            }
            ?>

            <div class="contact-form">
                <div class="form-box">
                    <input type="text" name="name" value="<?php echo $arrdata['author']; ?>" required>
                </div>
                <div class="form-box">
                    <input type="date"  name="date" min="2021-01-01" max="2030-12-31" value="<?php echo $arrdata['publish']; ?>" required>
                </div>
                <div class="form-box">
                    <input type="text" name="heading" value="<?php echo $arrdata['title']; ?>" required>
                </div>
                <div class="form-box">
                    <textarea name="content" id="" cols="30" rows="10" required><?php echo $arrdata['content']; ?></textarea>
                </div>
                <div>
                    <input class="btn-get" type="submit" value="Update" name="submit">
                </div>
            </div>
        </form>
    </div>


    <div class="footer max-width-2 m-auto my-2">
        <h2>Join millions of others</h2>
        <p>
            <a href="https://www.google.com/"><img src="img/google.png" alt=""></a>
            <a href="https://www.facebook.com/"><img src="img/face.png" alt=""></a>
            <a href="https://www.instagram.com/"><img src="img/insta.png" alt=""></a>
            <a href="https://twitter.com/?logout=1617701369361"><img src="img/twitter.png" alt=""></a>
            <a href="https://in.linkedin.com/"><img src="img/linkedin.png" alt=""></a>
        </p>
        <p>Whether sharing your expertise, breaking news, or whatever’s on your mind, you’re in good company on iBlog.
            <br>
            Sign up to discover why millions of people have published their passions here.
        </p>
    </div>
    <hr>
    <div style="height: 30px; padding-top: 9px; text-align: center;">
        <h5> &copy 2021 iBlog.in All rights reserved</h5>
    </div>


</body>
</html>

<?php

if(isset($_POST['query'])){
    $find=$_POST['find'];
    echo $_POST['find'];
}
?>