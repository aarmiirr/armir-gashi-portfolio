<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['emri'])) {
    header("Location: login.php"); 
    exit;
}

$user_name = $_SESSION['emri']; 
$selected_option = isset($_GET['option']) ? $_GET['option'] : 'home'; 
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fakulteti Filozofik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #0e7490 0%, #06b6d4 100%);
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 55px;
            height: 55px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: bold;
            color: #0891b2;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
        }

        .site-title {
            color: white;
            font-size: 24px;
            font-weight: 700;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        .logout-btn {
            padding: 10px 25px;
            background: white;
            color: #0891b2;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 255, 255, 0.4);
            background: #f0f9ff;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px;
            display: flex;
            gap: 30px;
        }

        .left-panel {
            width: 280px;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .left-panel h2 {
            color: #0891b2;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .left-panel h3 {
            color: #64748b;
            font-size: 16px;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .left-panel ul {
            list-style: none;
        }

        .left-panel ul li {
            margin: 15px 0;
        }

        .left-panel ul li a {
            display: block;
            padding: 12px 15px;
            color: #475569;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .left-panel ul li a:hover {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            transform: translateX(5px);
        }

        .right-panel {
            flex: 1;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            min-height: 600px;
        }

        .right-panel h2 {
            color: #0891b2;
            font-size: 32px;
            margin-bottom: 30px;
        }

        .right-panel h3 {
            color: #0e7490;
            font-size: 24px;
            margin: 30px 0 20px;
        }

        form {
            background: #f0f9ff;
            padding: 30px;
            border-radius: 15px;
            margin-top: 20px;
        }

        label {
            display: block;
            color: #0e7490;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #bae6fd;
            border-radius: 10px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #06b6d4;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.4);
        }

        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
                position: static;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .right-panel {
                padding: 25px;
            }

            .right-panel h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-section">
                <div class="logo">FF</div>
                <span class="site-title">Fakulteti Filozofik</span>
            </div>
            <div class="user-section">
                <span class="user-info">👤 <?php echo $user_name; ?></span>
                <a href="logout.php" class="logout-btn">Dilni</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="left-panel">
            <h2>Mirësevini, <?php echo $user_name; ?>!</h2>
            <h3>Fakulteti Filozofik</h3>
            <ul>
                <li><a href="dashboard.php">🏠 Ballina</a></li>
                <li><a href="?option=lendet">📚 Lëndët</a></li>
                <li><a href="?option=profesoret">👨‍🏫 Profesorët</a></li>
                <li><a href="?option=literatura">📖 Literatura</a></li>
                <li><a href="?option=konsultime">💬 Konsultime</a></li>
                <li><a href="?option=llogariaime">👤 Llogaria Ime</a></li>
                <li><a href="logout.php">🚪 Dilni</a></li>
            </ul>
        </div>

        <div class="right-panel">
            <?php
            if ($selected_option == 'lendet') {
                include('Lendet.php');
            } elseif ($selected_option == 'profesoret') {
                include('Profesoret.php');
            } elseif ($selected_option == 'literatura') {
                include('Literatura.php');
            } elseif ($selected_option == 'konsultime') {
                include('Konsultime.php');
            } elseif ($selected_option == 'llogariaime') {
                include('LlogariaIme.php');
            } else {
                echo "<h2>Mirësevini!</h2>";
                ?>
                
                <h3>Regjistro Semestrin:</h3>
                <form action="RegjistroSemestrin.php" method="POST">
                    <label for="emriStudentit">Emri i Studentit:</label>
                    <input type="text" id="emriStudentit" name="emriStudentit" required>

                    <label for="numriID">Numri i ID-së:</label>
                    <input type="text" id="numriID" name="numriID" required>

                    <label for="semestri">Semestri:</label>
                    <select id="semestri" name="semestri" required>
                        <option value="1">Semestri 1</option>
                        <option value="2">Semestri 2</option>
                        <option value="3">Semestri 3</option>
                        <option value="4">Semestri 4</option>
                        <option value="5">Semestri 5</option>
                        <option value="6">Semestri 6</option>
                    </select>

                    <label for="data">Data e Regjistrimit:</label>
                    <input type="date" id="data" name="data" required>

                    <label for="lendet">Lëndët e Zgjedhura:</label>
                    <input type="text" id="lendet" name="lendet" required>

                    <label for="pershkrimi">Përshkrimi:</label>
                    <textarea id="pershkrimi" name="pershkrimi" required></textarea>

                    <input type="submit" value="Regjistro Semestrin">
                </form>
                
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>