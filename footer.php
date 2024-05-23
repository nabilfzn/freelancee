<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
.footer-container {
    display: flex;
    justify-content: space-between;
    background-color: #282828;
    color: #ffffff;
    padding: 40px 20px;
}

.footer-section {
    flex: 1;
    margin: 0 20px;
}

.footer-section h2 {
    margin-bottom: 20px;
    border-bottom: 2px solid #444444;
    padding-bottom: 10px;
}

.footer-section p, .footer-section a {
    color: #cccccc;
}

.footer-section a {
    text-decoration: none;
}

.footer-section a:hover {
    color: #ffffff;
}

.socials {
    margin-top: 20px;
}

.socials a {
    display: inline-block;
    background-color: #444444;
    color: #ffffff;
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin-right: 10px;
    text-align: center;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.socials a:hover {
    background-color: #555555;
}

.footer-bottom {
    background-color: #1c1c1c;
    color: #999999;
    text-align: center;
    padding: 20px;
    border-top: 1px solid #444444;
}

    </style>
</head>
<body>
    

<footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>Tentang Kami</h2>
                <p>Kami adalah perusahaan yang berfokus pada menyediakan solusi terbaik untuk kebutuhan digital Anda. Hubungi kami untuk informasi lebih lanjut.</p>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section links">
                <h2>Tautan</h2>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h2>Kontak Kami</h2>
                <p><i class="fas fa-envelope"></i> info@contoh.com</p>
                <p><i class="fas fa-phone"></i> +62 123 456 789</p>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Jakarta, Indonesia</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Contoh Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>