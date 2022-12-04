<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iBlog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/createpost.css">
    <link rel="stylesheet" href="css/mobile.css">
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

    <div class="mainpost">
        <div class="innerpost max-width-1 m-auto">
            <div class="postimg">
                <img src="img/imgpost.jpg" alt="img">
            </div>
            <div class="postnew">
                <div class="texthead">
                    <h2>Blogger Showcase</h2>
                </div>
                <form action="" method="POST">
                    <div class="formrow">
                        <div class="inputdata">
                            <input type="text" name="name" placeholder="Author's Name" required>
                        </div>
                        <div class="inputdata">
                            <input type="date" name="date" min="2021-01-01" max="2030-12-31" required>
                        </div>
                    </div>

                    <div class="inputdata">
                        <div class="posthead">
                            <input type="text" name="heading" placeholder="Blog Title" required>
                        </div>
                    </div>

                    <div class="inputdata">
                        <div class="content-blog">
                            <textarea name="content" id="" cols="30" rows="5" placeholder="Blog Contents" required></textarea>
                        </div>
                    </div>

                    <div class="posting">
                        <input type="submit" value="Post" name="submit">
                </div>
                    
                </form>
            </div>


        </div>
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

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $dob=date('Y-m-d',strtotime($_POST['date']));
    $heading=$_POST['heading'];
    $blog=$_POST['content'];

    $insertquery="INSERT INTO blogger(author, publish, title, content) VALUES ('$name','$dob','$heading','$blog')";
    $res=mysqli_query($con,$insertquery);
    if($res){
        ?>
        <script>
            alert("Data Inserted...");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Data Not Inserted...");
        </script>
        <?php
    }
}
?>