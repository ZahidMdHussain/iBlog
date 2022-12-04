<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/mobile.css">
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

    <div class="home-articles max-width-1 m-auto font1 my-2">
        <h2>Your Searched Articles..</h2>

        <?php
            if(isset($_REQUEST['find'])){
            $heading=$_REQUEST['find'];
            $sql="SELECT * FROM blogger where title like '%$heading%'";
            $query=mysqli_query($con,$sql);
            $nums=mysqli_num_rows($query);
                while($res=mysqli_fetch_array($query))
                {
                ?>

                    <div class="home-article">
                    <div class="article-img">
                        <img src="img/<?php echo $res['id'];?>.png" alt="img">
                    </div>
                    <div class="article-content font2">
                        <a href="blog.php?id=<?php echo $res['id'];?>">
                            <h4><?php echo $res['title'];?></h4>
                        </a>
                        <span>Author: <?php echo $res['author'];?></span>
                        <span>Date: <?php echo $res['publish'];?></span>
                    </div>
                </div>
                    <?php
                }
        }?>

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
        <!-- <a href="https://www.vecteezy.com/free-vector/typing">Typing Vectors by Vecteezy</a> -->
    </div>
</body>

</html>
