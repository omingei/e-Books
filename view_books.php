<?php

require_once "require_login.php";

$genre = mysqli_real_escape_string($db, $_GET['genre']);

$sql = "SELECT * FROM books WHERE genre='$genre'";
$books = mysqli_query($db, $sql) or die ("Database error");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>drama.php</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    header{
	background-color: silver;
	width: 100%;
	height: 50px;
	float: left;
    font-size: 20px;
    text-align:left;
}

.dropbtn {
    background-color: rosybrown;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: silver;
}

div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}

    </style>  
</head>
<body>
<?php include "include/header.php" ?>

<h1><?= htmlentities($genre) ?></h2>
<?php while($book = mysqli_fetch_assoc($books)) { ?>

<div class="responsive">
  <div class="gallery">
    <a target="blank" href="#">
       <img src="<?= $book['image_path'] ?>" width="300" height="200">
       </a>
    <div class="desc">
      <a href="add_to_cart?book=<?= urlencode($book["id"])?>" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart
        </a>
    </div>
  </div>
</div>

<?php } ?>

<div class="clearfix"></div>



</body>
</html>
