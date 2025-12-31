<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave ka dështuar: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $fjalkalimi = $_POST['fjalkalimi'];

    $sql = "SELECT * FROM perdoruesit WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($fjalkalimi, $row['fjalkalimi'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['emri'] = $row['emri'];

            echo "<script>
                    alert('Kyçja ishte e suksesshme!');
                    window.location.href = 'dashboard.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Fjalëkalimi është gabim.');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Përdoruesi me këtë email nuk ekziston.');
              </script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyçu - Fakulteti Filozofik</title>
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

        .login-card {
            position: relative;
            z-index: 1;
            background: white;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            padding: 50px 45px;
            width: 100%;
            max-width: 480px;
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
            margin-bottom: 25px;
        }

        label {
            display: block;
            color: #0e7490;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
        }

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
            .login-card {
                padding: 40px 30px;
            }

            .card-header h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>
    <div class="bg-circle circle-3"></div>

    <div class="login-card">
        <div class="card-header">
            <div class="logo">FF</div>
            <h2>Kyçu</h2>
            <p>Mirësevini përsëri në platformën tonë</p>
        </div>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fjalkalimi">Fjalëkalimi:</label>
                <input type="password" id="fjalkalimi" name="fjalkalimi" required>
            </div>

            <input type="submit" value="Kyçu">
        </form>

        <div class="form-footer">
            <p>Nuk keni llogari? <a href="register.php">Regjistrohuni këtu</a></p>
        </div>
    </div>
</body>
</html>