<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jaybeegym";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa sambungan
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}
// Jika ada permintaan untuk padam data
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM ahli WHERE noic='$delete_id'");
    header("Location: table.php"); // Refresh halaman selepas padam
    exit();
}
// Ambil semua data dari jadual ahli
$sql = "SELECT * FROM ahli";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Ahli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color:  #00ced1;
            margin: 20px;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 80%;
            margin: auto;
            padding: 10px 0;
        }
        .logo {
            width: 100px; /* Saiz logo sesuai */
            height: auto;
            margin-right: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #008080;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-kembali, .btn-delete {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008080;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-kembali:hover {
            background-color: #006666;
        }
        .btn-delete {
    display: inline-block;
    padding: 8px 12px;
    background: linear-gradient(135deg, #ff6666, #ff1a1a); /* Gradient merah */
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: 0.3s ease-in-out;
    border: none;
    cursor: pointer;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}
.btn-delete:hover {
    background: linear-gradient(135deg, #cc0000, #990000); /* Merah lebih gelap */
    transform: scale(1.08);
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3);
}
/* Tambah ikon tong sampah sebelum teks DELETE */
.btn-delete::before {
    content: "🗑️ ";
    font-size: 14px;
    margin-right: 5px;
}
    </style>
</head>
<body>
    <div class="header-container">
        <img src="logo gym.jpeg" alt="Logo Jaybee Gym" class="logo">
        <marquee behavior="" direction=""><div class="title">Senarai Ahli Jaybee Gym</div></marquee>
    </div>   
    <table>
        <tr>
            <th>No Ahli</th>
            <th>Nama</th>
            <th>Nombor IC</th>
            <th>Tindakan</th>
        </tr>
        <?php
        include("config.php");
        $query=mysqli_query($con,"SELECT * FROM ahli");
        while($row=mysqli_fetch_assoc($query)){
            echo"
            <tr>
            <td>".$row['noahli']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['noic']."</td>
            <td><a class='btn-delete' href='delete.php?noahli=".$row['noahli']."'>DELETE</a></td>
            ";
        }
        ?>
    </table>
    <a href="daftar.php" class="btn-kembali">Daftar Ahli Baru</a>
    <a href="bmi.php" class="btn-kembali">Kira BMI</a>
</body>
</html>