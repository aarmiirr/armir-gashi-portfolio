<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emriStudentit = $_POST['emriStudentit'];
    $emailStudentit = $_POST['emailStudentit'];
    $lenda = $_POST['lenda'];
    $mesazhi = $_POST['mesazhi'];

    echo "<script>
            alert('Mesazhi është dërguar me sukses! Profesori do t\'ju përgjigjet sa më shpejt.');
            window.location.href = 'dashboard.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultime me Profesorët</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f9ff;
        }

        h2 {
            color: #0891b2;
            text-align: center;
            margin-bottom: 35px;
            font-size: 32px;
        }

        form {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(6, 182, 212, 0.15);
        }

        label {
            display: block;
            color: #0e7490;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #bae6fd;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f0f9ff;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #06b6d4;
            background: white;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 25px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.4);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

<h2>💬 Kërkesa për Konsultim me Profesorët</h2>

<form method="POST" action="konsultime.php">
    <label for="emriStudentit">Emri i Studentit:</label>
    <input type="text" id="emriStudentit" name="emriStudentit" required>

    <label for="emailStudentit">Emaili i Studentit:</label>
    <input type="email" id="emailStudentit" name="emailStudentit" required>

    <label for="lenda">Lënda:</label>
    <select id="lenda" name="lenda" required>
        <option value="">-- Zgjidhni lëndën --</option>
        <option value="Filozofia e Antikitetit">Filozofia e Antikitetit</option>
        <option value="Psikologjia e Edukimit">Psikologjia e Edukimit</option>
        <option value="Logjika">Logjika</option>
        <option value="Estetika">Estetika</option>
        <option value="Histori Mesjetare">Histori Mesjetare</option>
        <option value="Filozofia Politike">Filozofia Politike</option>
        <option value="Teoria e Shtetit">Teoria e Shtetit</option>
        <option value="Sociologjia e Grupeve">Sociologjia e Grupeve</option>
        <option value="Historia e Romës">Historia e Romës</option>
    </select>

    <label for="mesazhi">Mesazhi:</label>
    <textarea id="mesazhi" name="mesazhi" required placeholder="Shkruani mesazhin tuaj këtu..."></textarea>

    <input type="submit" value="Dërgo Kërkesën">
</form>

</body>
</html>