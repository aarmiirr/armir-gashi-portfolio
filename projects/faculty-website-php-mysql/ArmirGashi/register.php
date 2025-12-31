<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave ka dështuar: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $fjalkalimi = $_POST['fjalkalimi'];
    $fjalkalimi_konfirmim = $_POST['fjalkalimi_konfirmim'];
    
    if (!preg_match("/^[a-zA-Z\s]*$/", $emri)) {
        echo "<script>alert('Emri mund të përmbajë vetëm shkronja dhe hapësira.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email-i është i pavlefshëm.');</script>";
    } else {
        $sql_check = "SELECT * FROM perdoruesit WHERE email = '$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "<script>alert('Ky email është regjistruar tashmë.');</script>";
        } elseif (strlen($fjalkalimi) < 8) {
            echo "<script>alert('Fjalëkalimi duhet të ketë të paktën 8 karaktere.');</script>";
        } elseif (!preg_match("/[A-Z]/", $fjalkalimi) || !preg_match("/[a-z]/", $fjalkalimi) || !preg_match("/[0-9]/", $fjalkalimi)) {
            echo "<script>alert('Fjalëkalimi duhet të përmbajë shkronja të mëdha, të vogla dhe numra.');</script>";
        } elseif ($fjalkalimi != $fjalkalimi_konfirmim) {
            echo "<script>alert('Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përputhen.');</script>";
        } else {
            $fjalkalimi_hashed = password_hash($fjalkalimi, PASSWORD_DEFAULT);
            $sql = "INSERT INTO perdoruesit (emri, email, fjalkalimi) VALUES ('$emri', '$email', '$fjalkalimi_hashed')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Regjistrimi ishte i suksesshëm!');
                        window.location.href = 'login.php';
                      </script>";
            } else {
                echo "<script>alert('Gabim: " . $conn->error . "');</script>";
            }
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrohu - Fakulteti Filozofik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 25s infinite ease-in-out;
        }

        .circle-1 {
            width: 350px;
            height: 350px;
            top: -120px;
            left: -120px;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 450px;
            height: 450px;
            bottom: -180px;
            right: -180px;
            animation-delay: 3s;
        }

        .circle-3 {
            width: 250px;
            height: 250px;
            top: 45%;
            right: 8%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(40px, 40px) scale(1.15);
            }
        }

        .register-card {
            position: relative;
            z-index: 1;
            background: white;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            padding: 50px 45px;
            width: 100%;
            max-width: 520px;
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            color: white;
            font-weight: bold;
            animation: pulse 2.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(6, 182, 212, 0.7);
            }
            50% {
                box-shadow: 0 0 0 25px rgba(6, 182, 212, 0);
            }
        }

        .card-header h2 {
            color: #0891b2;
            font-size: 32px;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .card-header p {
            color: #64748b;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            color: #0e7490;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #bae6fd;
            border-radius: 12px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f0f9ff;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #06b6d4;
            background: white;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15);
        }

        input[type="submit"] {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.4);
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(6, 182, 212, 0.6);
        }

        input[type="submit"]:active {
            transform: translateY(-1px);
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            font-size: 15px;
        }

        .form-footer a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #06b6d4;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .register-card {
                padding: 40px 30px;
            }

            .card-header h2 {
                font-size: 26px;
            }

            .logo {
                width: 80px;
                height: 80px;
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>
    <div class="bg-circle circle-3"></div>

    <div class="register-card">
        <div class="card-header">
            <div class="logo">FF</div>
            <h2>Regjistrohu</h2>
            <p>Krijo llogarinë tënde të re</p>
        </div>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="emri">Emri:</label>
                <input type="text" id="emri" name="emri" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fjalkalimi">Fjalëkalimi:</label>
                <input type="password" id="fjalkalimi" name="fjalkalimi" required>
            </div>

            <div class="form-group">
                <label for="fjalkalimi_konfirmim">Konfirmo Fjalëkalimin:</label>
                <input type="password" id="fjalkalimi_konfirmim" name="fjalkalimi_konfirmim" required>
            </div>

            <input type="submit" value="Regjistrohu">
        </form>

        <div class="form-footer">
            <p>Keni një llogari? <a href="login.php">Kyçuni këtu</a></p>
        </div>
    </div>
</body>
</html>