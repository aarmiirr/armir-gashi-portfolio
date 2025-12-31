<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email']) || !isset($_SESSION['emri'])) {
    header("Location: login.php"); 
    exit;
}

?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistro Semestrin - Fakulteti Filozofik</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="right-panel">
        <p>Këtu mund të shihni informacionet mbi afatet e hapura për regjistrim.</p>

        <h3>Regjistro Semestrin:</h3>
        <p>Mundësia për regjistrim është e disponueshme.</p>
        <form action="RegjistroSemestrin.php" method="POST">
            <label for="emriStudentit">Emri i Studentit:</label>
            <input type="text" id="emriStudentit" name="emriStudentit" required><br><br>

            <label for="numriID">Numri i ID-së:</label>
            <input type="text" id="numriID" name="numriID" required><br><br>

            <label for="semestri">Semestri:</label>
            <select id="semestri" name="semestri" required>
                <option value="1">Semestri 1</option>
                <option value="2">Semestri 2</option>
                <option value="3">Semestri 3</option>
                <option value="4">Semestri 4</option>
                <option value="5">Semestri 5</option>
                <option value="6">Semestri 6</option>
            </select><br><br>

            <label for="data">Data e Regjistrimit:</label>
            <input type="date" id="data" name="data" required><br><br>

            <label for="lendet">Lëndët e Zgjedhura:</label>
            <input type="text" id="lendet" name="lendet" required><br><br>

            <label for="pershkrimi">Përshkrimi:</label>
            <textarea id="pershkrimi" name="pershkrimi" required></textarea><br><br>

            <input type="submit" value="Regjistro Semestrin">
        </form>
    </div>

</body>

</html>
