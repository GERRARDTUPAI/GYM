<!DOCTYPE html>
<html>
<head>
    <title>PENGIRAAN BMI</title>
    <style>
        body {
            background-color: #00ced1;
            color: black;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            font-size: 2em;
        }
        /* Styling untuk butang */
        button {
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            color: white;
            font-weight: bold;
        }
        /* Warna butang */
        .btn-hantar { background-color: yellow; color: black; }
        .btn-reset { background-color: blue; }
        .btn-daftar { background-color: black; }
        .btn-jadual { background-color: red; }
        /* Hover effect */
        button:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        /* Styling untuk jadual */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto; /* Pusatkan jadual */
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>KIRA BMI</h1>

    <!-- Form -->
    <form action="">
        <label>Berat (kg):</label>
        <input type="number" id="berat">
        <br><br>
        <label>Tinggi (cm):</label>
        <input type="number" id="tinggi">
        <br><br>
        <button type="button" class="btn-hantar" onclick="Hantar()">Hantar</button>
        <button type="button" class="btn-reset" onclick="Reset()">Reset</button>
    </form> 
    <!-- Table -->
    <table>
        <tr>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>BMI</th>
            <th>Keputusan</th>
        </tr>
        <tr>
            <td id="berat1">-</td>
            <td id="tinggi2">-</td>
            <td id="bmi">-</td>
            <td id="Keputusan">-</td>
        </tr>
    </table>

    <!-- Butang Navigasi -->
    <br>
    <button class="btn-jadual"><a href="table.php" style="color: white; text-decoration: none;">JADUAL</a></button>
    <button class="btn-daftar"><a href="daftar.php" style="color: white; text-decoration: none;">DAFTAR</a></button>
    <script>
        function Hantar() {
            var berat = parseFloat(document.getElementById("berat").value);
            var tinggi = parseFloat(document.getElementById("tinggi").value);
            if (isNaN(berat) || isNaN(tinggi) || berat <= 0 || tinggi <= 0) {
                alert("Sila masukkan berat dan tinggi yang betul!");
                return;
            }
            // Convert tinggi dari cm ke meter
            if (tinggi > 10) {
                tinggi = tinggi / 100;
            }
            var bmi = berat / (tinggi * tinggi);
            document.getElementById("berat1").innerHTML = berat;
            document.getElementById("tinggi2").innerHTML = tinggi.toFixed(2);
            document.getElementById("bmi").innerHTML = bmi.toFixed(2);
            var kategori = "";
            if (bmi < 18.5) {
                kategori = "Kurus";
                document.getElementById("Keputusan").style.backgroundColor = "red"; 
            } else if (bmi >= 18.5 && bmi <= 24.9) {
                kategori = "Normal";
                document.getElementById("Keputusan").style.backgroundColor = "green"; 
            } else if (bmi >= 25 && bmi <= 29.9) {
                kategori = "Gemuk";
                document.getElementById("Keputusan").style.backgroundColor = "orange";
            } else {
                kategori = "Obesiti";
                document.getElementById("Keputusan").style.backgroundColor = "red";
            }
            // Paparkan kategori dan BMI dalam Keputusan
            document.getElementById("Keputusan").innerHTML = kategori + " (BMI: " + bmi.toFixed(2) + ")";
        }
        function Reset() {
            document.getElementById("berat").value = "";
            document.getElementById("tinggi").value = "";
            document.getElementById("berat1").innerHTML = "-";
            document.getElementById("tinggi2").innerHTML = "-";
            document.getElementById("bmi").innerHTML = "-";
            document.getElementById("Keputusan").innerHTML = "-";
            document.getElementById("Keputusan").style.backgroundColor = "transparent";
        }
    </script>
</body>
</html>
