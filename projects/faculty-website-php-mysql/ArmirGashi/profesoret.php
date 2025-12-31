<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesorët - Fakulteti Filozofik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f9ff;
            padding: 20px;
        }

        h2 {
            color: #0891b2;
            margin-bottom: 35px;
            text-align: center;
            font-size: 32px;
        }

        table {
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(6, 182, 212, 0.15);
        }

        th, td {
            padding: 20px;
            text-align: left;
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
            font-size: 15px;
        }

        tr:hover {
            background: #f0f9ff;
            transition: background 0.3s ease;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .professor-name {
            color: #0891b2;
            font-weight: 600;
        }
    </style>
</head>
<body>
<h2>👨‍🏫 Lista e Profesorëve dhe Lëndëve</h2>
<table>
    <tr>
        <th>Emri i Profesorit</th>
        <th>Lënda</th>
        <th>Semestri</th>
    </tr>

    <?php
    $profesorët = [
        ["emri" => "Dr. Dritan Pjetërsi", "lenda" => "Filozofia e Antikitetit", "semestri" => "Semestri 1"],
        ["emri" => "Prof. Lea Jashari", "lenda" => "Psikologjia e Edukimit", "semestri" => "Semestri 1"],
        ["emri" => "Dr. Ermir Bajrami", "lenda" => "Logjika", "semestri" => "Semestri 2"],
        ["emri" => "Prof. Alma Xhafa", "lenda" => "Estetika", "semestri" => "Semestri 2"],
        ["emri" => "Dr. Genti Duka", "lenda" => "Histori Mesjetare", "semestri" => "Semestri 3"],
        ["emri" => "Prof. Marko Kola", "lenda" => "Filozofia Politike", "semestri" => "Semestri 3"],
        ["emri" => "Dr. Ana Kovaçi", "lenda" => "Teoria e Shtetit", "semestri" => "Semestri 4"],
        ["emri" => "Prof. Enis Misha", "lenda" => "Filozofia e Artit", "semestri" => "Semestri 4"],
        ["emri" => "Dr. Erida Lushi", "lenda" => "Sociologjia e Grupeve", "semestri" => "Semestri 5"],
        ["emri" => "Prof. Roni Gashi", "lenda" => "Historia e Romës", "semestri" => "Semestri 5"],
    ];
    foreach ($profesorët as $profesor) {
        echo "<tr>
                <td class='professor-name'>" . $profesor['emri'] . "</td>
                <td>" . $profesor['lenda'] . "</td>
                <td>" . $profesor['semestri'] . "</td>
              </tr>";
    }
    ?>

</table>

</body>
</html>