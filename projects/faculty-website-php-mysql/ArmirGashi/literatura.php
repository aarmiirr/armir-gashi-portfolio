<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista e Literaturës</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            padding: 40px 20px;
            min-height: 100vh;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #0891b2;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(8, 145, 178, 0.2);
        }

        .subtitle {
            color: #0e7490;
            font-size: 18px;
            font-weight: 400;
        }

        .books-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-wrapper {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(6, 182, 212, 0.2);
            animation: slideUp 1s ease-out 0.3s both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        }

        th {
            padding: 25px 20px;
            text-align: left;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        tbody tr {
            border-bottom: 1px solid #e0f2fe;
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, #f0f9ff 0%, #e0f2fe 100%);
            transform: scale(1.01);
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 22px 20px;
            color: #475569;
            font-size: 16px;
        }

        .book-title {
            color: #0891b2;
            font-weight: 600;
            font-size: 17px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .book-icon {
            font-size: 24px;
            filter: drop-shadow(0 2px 5px rgba(6, 182, 212, 0.3));
        }

        .author-name {
            color: #0e7490;
            font-weight: 500;
            font-style: italic;
        }

        .year {
            color: #64748b;
            font-weight: 600;
            background: #f0f9ff;
            padding: 6px 15px;
            border-radius: 20px;
            display: inline-block;
        }

        .stats-bar {
            max-width: 1200px;
            margin: 0 auto 30px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeIn 1s ease-out 0.5s both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .stat-card {
            background: white;
            padding: 20px 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.15);
            text-align: center;
            min-width: 150px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #0891b2;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 32px;
            }

            .table-wrapper {
                border-radius: 15px;
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }

            th, td {
                padding: 15px 12px;
                font-size: 14px;
            }

            .book-title {
                font-size: 15px;
            }

            .stats-bar {
                flex-direction: column;
                align-items: center;
            }

            .stat-card {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>

<div class="page-header">
    <h2>📚 Literatura e Filozofisë</h2>
    <p class="subtitle">Librat klasikë të mendimit filozofik</p>
</div>

<div class="stats-bar">
    <div class="stat-card">
        <span class="stat-number">10</span>
        <span class="stat-label">Libra</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">10</span>
        <span class="stat-label">Autorë</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">2000+</span>
        <span class="stat-label">Vite Histori</span>
    </div>
</div>

<div class="books-container">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>📖 Titulli i Librit</th>
                    <th>✍️ Autori</th>
                    <th>📅 Viti i Botimit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $librat = [
                    ["titulli" => "Meditations", "autori" => "Marcus Aurelius", "viti" => "180"],
                    ["titulli" => "Being and Nothingness", "autori" => "Jean-Paul Sartre", "viti" => "1943"],
                    ["titulli" => "Fear and Trembling", "autori" => "Søren Kierkegaard", "viti" => "1843"],
                    ["titulli" => "The Republic", "autori" => "Plato", "viti" => "380 BC"],
                    ["titulli" => "The Prince", "autori" => "Niccolò Machiavelli", "viti" => "1532"],
                    ["titulli" => "Thus Spoke Zarathustra", "autori" => "Friedrich Nietzsche", "viti" => "1883"],
                    ["titulli" => "The Social Contract", "autori" => "Jean-Jacques Rousseau", "viti" => "1762"],
                    ["titulli" => "The Second Sex", "autori" => "Simone de Beauvoir", "viti" => "1949"],
                    ["titulli" => "On Liberty", "autori" => "John Stuart Mill", "viti" => "1859"],
                    ["titulli" => "The Myth of Sisyphus", "autori" => "Albert Camus", "viti" => "1942"],
                ];

                foreach ($librat as $libri) {
                    echo "<tr>
                            <td><div class='book-title'><span class='book-icon'>📕</span>" . $libri['titulli'] . "</div></td>
                            <td><span class='author-name'>" . $libri['autori'] . "</span></td>
                            <td><span class='year'>" . $libri['viti'] . "</span></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>