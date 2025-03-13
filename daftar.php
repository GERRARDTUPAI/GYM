<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELAMAT MENDAFTAR</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #00ced1;
            text-align: center;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            margin-top: 20px;
        }
        h2 {
            color: #333;
            margin-bottom: 15px;
        }
        .form-container p {
            margin: 10px 0;
            font-size: 16px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .submit-btn {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            background-color: #008080;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #006666;
        }
        .marquee-container {
            font-size: 20px;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
        }
        .form-container img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .footer {
        background-color: greenyellow;
        color: black;
        text-align: center;
        padding: 20px;
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        border-top: 4px solid #ffcc00; /* Garis emas di atas footer */
        box-shadow: 0px -5px 10px rgba(255, 255, 255, 0.2);
        width: 100%; /* Memastikan footer penuh dari hujung ke hujung */
        position: relative; /* Elak bertindih dengan elemen lain */
        bottom: 0;
        left: 0;
    }
    .footer p {
        margin: 8px 0;
    }
    .footer a {
        color: #ffcc00; /* Warna emas */
        text-decoration: none;
        font-weight: bold;
    }
    .footer a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="marquee-container">
        <marquee behavior="scroll" direction="left">SELAMAT DATANG KE JAYBEE GYM</marquee>
    </div>

    <div class="form-container">
        <h2>SELAMAT MENDAFTAR</h2>
        <form action="daftar.php" method="post">
            <img src="logo gym.jpeg" alt="Logo Jaybee Gym">
            <p>NAMA:<br> <input type="text" name="nama" placeholder="HURUF BESAR DAN NAMA PENUH" required></p>
            <p>NOMBOR IC:<br> <input type="number" name="noic" placeholder="Tanpa jarak, - atau /" required></p>
            <button type="submit" class="submit-btn">Hantar</button>
        </form>
    </div>
     <!-- Footer -->
     <div class="footer">
    <p>🏋️‍♂️ **Hubungi Kami** 🏋️‍♀️</p>
    <p>📞 **Coach G**: <a href="tel:0198475382">019-847 5382</a></p>
    <p>📞 **Coach Mirza**: <a href="tel:011345560">011-345 560</a></p>
    <p>📞 **Coach Firdaus**: <a href="tel:011345560">011-345 560</a></p>
    <p>💪 "Latihan yang konsisten membawa kejayaan yang luar biasa!" 🏆</p>
</div>
</body>
</html>
<?php
// Sambungkan ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "jaybeegym";

$con = new mysqli($host, $user, $password, $database);

// Semak jika sambungan berjaya
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $noic = mysqli_real_escape_string($con, $_POST['noic']);

    $sql = "INSERT INTO ahli (nama, noic) VALUES ('$nama', '$noic')";

    if ($con->query($sql) === TRUE) {
        header("Location: table.php");
        exit();
    } else {
        echo "Ralat: " . $con->error;
    }
}

$con->close();
?>
