<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave ka dështuar: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emri_lendes'])) {
    $emri_lendes = $_POST['emri_lendes'];
    $semestri = $_POST['semestri'];

    $sql = "INSERT INTO lendet (emri_lendes, semestri) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $emri_lendes, $semestri);

    if ($stmt->execute()) {
        echo "<script>alert('Lënda është regjistruar me sukses!');</script>";
    } else {
        echo "<script>alert('Gabim në regjistrim!');</script>";
    }

    $stmt->close();
}

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM lendet WHERE id_lenda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $lenda = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['update_id'])) {
    $id = $_POST['update_id'];
    $emri_lendes = $_POST['emri_lendes'];
    $semestri = $_POST['semestri'];

    $sql = "UPDATE lendet SET emri_lendes = ?, semestri = ? WHERE id_lenda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $emri_lendes, $semestri, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Lënda është përditësuar me sukses!');</script>";
    } else {
        echo "<script>alert('Gabim në përditësim!');</script>";
    }

    $stmt->close();
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM lendet WHERE id_lenda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Lënda është fshirë me sukses!');</script>";
    } else {
        echo "<script>alert('Gabim në fshirje!');</script>";
    }

    $stmt->close();
}

$sql = "SELECT * FROM lendet";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lëndët - Fakulteti Filozofik</title>
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

        h2, h3 {
            color: #0891b2;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-container {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(6, 182, 212, 0.15);
            margin-bottom: 40px;
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
        select {
            width: 100%;
            padding: 12px 18px;
            border: 2px solid #bae6fd;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f0f9ff;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #06b6d4;
            background: white;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
        }

        table {
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(6, 182, 212, 0.15);
            margin-top: 30px;
        }

        th, td {
            padding: 18px;
            text-align: center;
            border-bottom: 1px solid #e0f2fe;
        }

        th {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            color: #475569;
        }

        tr:hover {
            background: #f0f9ff;
        }

        tr:last-child td {
            border-bottom: none;
        }

        a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            padding: 5px 10px;
        }

        a:hover {
            color: #06b6d4;
            text-decoration: underline;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #64748b;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h2>📚 Menaxho Lëndët</h2>

    <div class="form-container">
        <form action="lendet.php" method="POST">
            <label for="emri_lendes">Emri i Lëndës:</label>
            <input type="text" id="emri_lendes" name="emri_lendes" required>

            <label for="semestri">Semestri:</label>
            <select id="semestri" name="semestri" required>
                <option value="1">Semestri 1</option>
                <option value="2">Semestri 2</option>
                <option value="3">Semestri 3</option>
                <option value="4">Semestri 4</option>
                <option value="5">Semestri 5</option>
                <option value="6">Semestri 6</option>
            </select>

            <input type="submit" value="Regjistro Lëndën">
        </form>
    </div>

    <h3>Lista e Lëndëve të Regjistruara</h3>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Emri i Lëndës</th>
                <th>Semestri</th>
                <th>Veprime</th>
            </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_lenda']; ?></td>
                <td><?php echo $row['emri_lendes']; ?></td>
                <td>Semestri <?php echo $row['semestri']; ?></td>
                <td>
                    <a href="lendet.php?edit_id=<?php echo $row['id_lenda']; ?>">✏️ Ndrysho</a> |
                    <a href="lendet.php?delete_id=<?php echo $row['id_lenda']; ?>" onclick="return confirm('A jeni të sigurt se doni të fshini këtë lëndë?');">🗑️ Fshi</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    <?php else: ?>
        <div class="no-data">
            <p>Asnjë lëndë nuk është regjistruar ende.</p>
        </div>
    <?php endif; ?>

    <?php if (isset($lenda)): ?>
        <div class="form-container" style="margin-top: 40px;">
            <h3>Ndrysho Lëndën: <?php echo $lenda['emri_lendes']; ?></h3>
            <form action="lendet.php" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $lenda['id_lenda']; ?>">

                <label for="emri_lendes">Emri i Lëndës:</label>
                <input type="text" id="emri_lendes" name="emri_lendes" value="<?php echo $lenda['emri_lendes']; ?>" required>

                <label for="semestri">Semestri:</label>
                <select id="semestri" name="semestri" required>
                    <option value="1" <?php echo $lenda['semestri'] == '1' ? 'selected' : ''; ?>>Semestri 1</option>
                    <option value="2" <?php echo $lenda['semestri'] == '2' ? 'selected' : ''; ?>>Semestri 2</option>
                    <option value="3" <?php echo $lenda['semestri'] == '3' ? 'selected' : ''; ?>>Semestri 3</option>
                    <option value="4" <?php echo $lenda['semestri'] == '4' ? 'selected' : ''; ?>>Semestri 4</option>
                    <option value="5" <?php echo $lenda['semestri'] == '5' ? 'selected' : ''; ?>>Semestri 5</option>
                    <option value="6" <?php echo $lenda['semestri'] == '6' ? 'selected' : ''; ?>>Semestri 6</option>
                </select>

                <input type="submit" value="Përditëso Lëndën">
            </form>
        </div>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>