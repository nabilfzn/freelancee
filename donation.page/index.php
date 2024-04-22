<?php
require "../login/koneksi.php";

$query = "SELECT * FROM donasi";
$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            
        }
    </style>
</head>
<body>
    

    <nav>
        <div class="container">
            <div class="boxnav">
                <div class="logo">
                    <h1>Findceer</h1>
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <a href=""><img src="user.png" alt=""></a>
                </div>
            </div>
        </div>
    </nav>


    <div class="banner">
        <div class="content">
            <h1>Donasikan sebagian, untuk mereka yang membutuhkan</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maiores voluptates repellat illum, nulla magni inventore excepturi corrupti aliquam fuga.</p>
            <div class="btn-kanan">
                <a href="../open-donation/index.php"><button>Buat Donasi!</button></a>
            </div>
        </div>  
    </div>

    <style>
        .main-content {
    /* background-color: #666; */
    height: 100vh;
    margin-top: 100px;
}


.card-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 1rem;
  }
  
  .card {
    background-color: #f1f1f1;
    border-radius: 5px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  .card-image {
    height: 150px;
    overflow: hidden;
  }
  
  .card-image img {
    width: 100%;
    height: 30vh;
    object-fit: cover;
  }
  
  .card-content {
    padding: 1.5rem;
    text-align: center;
  }
  
  .card-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
  }
  
  .card-tagline {
    font-size: 1rem;
    color: #666;
    margin-bottom: 1rem;
  }
  
  .card-buttons {
    display: flex;
    justify-content: center;
  }
  
  .card-buttons button {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 0.5rem 1rem;
    text-transform: uppercase;
    font-size: 0.8rem;
    margin-right: 0.5rem;
    cursor: pointer;
  }
  
  .card-buttons button:hover {
    background-color: #3e8e41;
  }
  

  .card-grid {
    animation: fadeIn 1s ease-in-out both;
  }
  
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
    </style>

<div class="container">
    <div class="main-content">
        <div class="card-grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                

                // data
                $id = $row['id'];
                $judul = $row['judul'];
                $penerima = $row['penerima'];
                $deskripsi = $row['deskripsi'];
                $gambar = $row['gambar'];
            
            ?>
                <!-- // format html -->



                <div class="card">
                    <div class="card-image">
                        <img src="../open-donation/file/<?php echo $gambar ?>">
                    </div>

                    <div class="card-content">
                            <h5 class="card-title"><?php echo $judul ?></h5>
                        <div class="card-buttons">
                            <button class="wishlist-button">Wishlist</button>
                            <a href="../donation.page/donate-page/index.php?id=<?php echo $id ?>">
                            
                            <button class="donation-button">Donation</button></a>
                        </div>
                    </div>
                </div>
               <?php }?>
        
        </div>
    </div>
</div>


<footer>

        <div class="footer">
            <div class="row">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
            
            <div class="row">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>
            
            <div class="row">
                FINDCARE Copyright © 2024 FINDCARE
            </div>

        </div>
</footer>

</body>
</html>