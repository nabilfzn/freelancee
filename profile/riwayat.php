<?php
    require "../login/koneksi.php";

    $query = "SELECT donasi.id_donasi, donasi.judul, donasi.penerima, donasi.deskripsi, donasi.gambar, donasi.id_penggalang_dana, donasi.waktu, payment.id_donasi, payment.id_donasi 
    FROM donasi
    INNER JOIN payment ON donasi.id_donasi = payment.id_donasi
    WHERE payment.id_user = {$_SESSION["id_user"]}";



    $hasil = mysqli_query($conn, $query);




    ?>       
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <style>
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
    height: 20vh;
    object-fit: cover;
  }
  
  .card-content {
    padding: 1rem;
    text-align: center;
  }
  
  .card-title {
    font-size: 1rem;
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
        </style>
    </head>
    <body>
        
    <div class="container">
        <div class="main-content">
            <div class="card-grid">
            <?php
                while ($row = mysqli_fetch_assoc($hasil)) {
                

                // data
                $judul = $row['judul'];
                $penerima = $row['penerima'];
                $deskripsi = $row['deskripsi'];
                $gambar = $row['gambar'];
                $_SESSION['id_donasi'] = $row['id_donasi'];
                ?>
                <!-- // format html -->
                
                
                

                <div class="card">
                    <div class="card-image">
                        <img src="../open-donation/file/<?php echo $gambar ?>">
                    </div>
                    
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $judul ?></h2>
                    </div>
                </div>
               <?php }?>


    </body>
    </html>
   