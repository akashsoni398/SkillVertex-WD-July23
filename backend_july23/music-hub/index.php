<?php 

include "./dbconfig.php";

session_start(); 

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ./index.php");
}
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Music Hub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/main.css" />
    </head>
    <body>
        
        <header>
            <a href="">Licensing Policy</a>
            <a href="">Terms and Conditions</a>
            <div id="cart">
                <i class="bi bi-cart3"></i>
            </div>

            <?php if(isset($_SESSION['username'])) { ?>
                <div id="auth-container">
                    <button id="auth-btn"><?php echo $_SESSION['username'] ?></button>
                    <div id="auth-dropdown-content">
                        <a href="./auth/changepwd.php">Change account password</a>
                        <a href="./index.php?logout=true">Logout</a>
                    </div>
                </div>
            <?php } else { ?>
                <div id="auth-container">
                    <button id="auth-btn">LOGIN</button>
                    <div id="auth-dropdown-content">
                        <a href="./auth/login.php">Login into existing account</a>
                        <a href="./auth/register.php">Create a new account</a>
                    </div>
                </div>
            <?php } ?>

        </header>

        <section id="branding">
            <div class="left-content">
                <img src="./assets/images/logo.gif" height="150px" />
                <h1>MUSIC HUB</h1>
                <p>----------------------------------------------------<br>One stop shop for all your music needs</p>
            </div>
            <div class="right-content">
                <form id="search-form" method="get" action="search-results.php">
                    <input type="search" name="search" placeholder="Search songs, artists, albums, etc..."/>
                    <button><i class="bi bi-search"></i></button>
                </form>
            </div>
        </section>

        <nav>
            <li><a href="index.html">Home</a></li>
            <li><a href="hits.html">Top Hits</a></li>
            <li><a href="newrelease.html">New Releases</a></li>
            <li><a href="saved.html">Favourites</a></li>
            <li><a href="recent.html">Recently Played</a></li>
            <li><a href="about.html">About us</a></li>
        </nav>

        <main>
            <!-- songs displayed dynamically -->
            <div class="row row-cols-1 row-cols-md-3 g-4 my-3 mx-4">
                
                <?php 
                $sql_query = "SELECT * FROM music ORDER BY name;";
                $result = mysqli_query($conn,$sql_query);
                
                while($rows = mysqli_fetch_array($result)) {
                ?>
                <div class="col">
                    <div class="card m-5 h-100">
                    <img src="./assets/musicimg/<?php echo $rows['image'] ?>" class="card-img-top" alt="...">
                    <audio controls>
                        <source src="./assets/music/<?php echo $rows['link'] ?>" />
                    </audio>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['name'] ?></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </main>

        <footer class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img class="" src="./assets/images/logo.gif" height="100px"/>
                    </div>
                    <div class="col">
                        <p>Music Hub is your ultimate destination for music streaming and licensing. Explore a diverse catalog, curate personalized playlists, and empower artists by licensing their music for your projects.</p>
                    </div>
                </div>
                <div class="row">
                    <i class="bi bi-instagram"></i>
                </div>
            </div>
            <div class="col-2">
                Quick Links
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="hits.html">Top Hits</a></li>
                    <li><a href="newrelease.html">New Releases</a></li>
                    <li><a href="saved.html">Favourites</a></li>
                    <li><a href="recent.html">Recently Played</a></li>
                    <li><a href="about.html">About us</a></li>
                </ul>
            </div>
            <div class="col-2">legal
                <ul>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="tnc.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <div class="col-4">Newsletter</div>
        </footer>
    </body>
</html>