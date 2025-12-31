<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

$sql = "SELECT * FROM regjistrimi_semestrit ORDER BY data_regjistrimit DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llogaria Ime - Fakulteti Filozofik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ecfeff 0%, #cffafe 50%, #a5f3fc 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
        }

        /* Header Section */
        .header-section {
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin: 0 auto 25px;
            box-shadow: 0 15px 40px rgba(6, 182, 212, 0.4);
            animation: pulse 3s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 15px 40px rgba(6, 182, 212, 0.4);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 20px 60px rgba(6, 182, 212, 0.6);
                transform: scale(1.05);
            }
        }

        h1 {
            color: #0891b2;
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 4px 15px rgba(8, 145, 178, 0.2);
        }

        .subtitle {
            color: #0e7490;
            font-size: 20px;
            font-weight: 500;
        }

        /* Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
            animation: fadeIn 1s ease-out 0.3s both;
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
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(6, 182, 212, 0.15);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #06b6d4, #0891b2);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 70px rgba(6, 182, 212, 0.25);
            border-color: #06b6d4;
        }

        .stat-icon {
            font-size: 55px;
            margin-bottom: 20px;
            display: block;
            filter: drop-shadow(0 4px 15px rgba(6, 182, 212, 0.3));
        }

        .stat-number {
            font-size: 48px;
            font-weight: 800;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            margin-bottom: 10px;
            line-height: 1;
        }

        .stat-label {
            color: #64748b;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Table Section */
        .table-section {
            animation: slideUp 1s ease-out 0.6s both;
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

        .section-title {
            color: #0891b2;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .table-wrapper {
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(6, 182, 212, 0.2);
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
            font-weight: 700;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1.2px;
        }

        tbody tr {
            border-bottom: 2px solid #e0f2fe;
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
            transform: scale(1.008);
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 25px 20px;
            color: #475569;
            font-size: 15px;
            font-weight: 500;
        }

        .student-name {
            color: #0891b2;
            font-weight: 700;
            font-size: 16px;
        }

        .id-badge {
            background: #f0f9ff;
            color: #0e7490;
            padding: 8px 18px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 14px;
            display: inline-block;
            border: 2px solid #bae6fd;
        }

        .semester-badge {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 14px;
            display: inline-block;
            box-shadow: 0 5px 20px rgba(6, 182, 212, 0.4);
        }

        .date-text {
            color: #64748b;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .subjects-list {
            color: #0e7490;
            font-weight: 600;
            line-height: 1.6;
        }

        .description-text {
            color: #64748b;
            font-style: italic;
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 20px;
        }

        .empty-icon {
            font-size: 120px;
            margin-bottom: 30px;
            opacity: 0.6;
            filter: grayscale(0.3);
        }

        .empty-title {
            color: #0891b2;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .empty-text {
            color: #64748b;
            font-size: 18px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .table-wrapper {
                border-radius: 20px;
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }

            th, td {
                padding: 18px 15px;
                font-size: 13px;
            }

            .section-title {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <div class="header-icon">👤</div>
        <h1>Llogaria Ime</h1>
        <p class="subtitle">Këtu mund të shihni të gjitha regjistrimet tuaja të semestrit</p>
    </div>

    <?php
    $total_registrations = $result->num_rows;
    $result->data_seek(0);
    
    // Calculate total subjects
    $total_subjects = 0;
    $semesters = [];
    while($row = $result->fetch_assoc()) {
        $subjects = explode(',', $row["lendet"]);
        $total_subjects += count($subjects);
        $semesters[] = $row["semestri"];
    }
    $unique_semesters = count(array_unique($semesters));
    $result->data_seek(0);
    ?>

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-icon">📝</span>
            <span class="stat-number"><?php echo $total_registrations; ?></span>
            <span class="stat-label">Regjistrime Totale</span>
        </div>
        
        <div class="stat-card">
            <span class="stat-icon">📚</span>
            <span class="stat-number"><?php echo $total_subjects; ?></span>
            <span class="stat-label">Lëndë të Regjistruara</span>
        </div>
        
        <div class="stat-card">
            <span class="stat-icon">🎓</span>
            <span class="stat-number"><?php echo $unique_semesters; ?></span>
            <span class="stat-label">Semestra Aktivë</span>
        </div>
        
        <div class="stat-card">
            <span class="stat-icon">✅</span>
            <span class="stat-number">Aktiv</span>
            <span class="stat-label">Statusi i Llogarisë</span>
        </div>
    </div>

    <div class="table-section">
        <h2 class="section-title">
            <span>📋</span> Regjistrimet e Mia
        </h2>
        
        <div class="table-wrapper">
            <?php if ($total_registrations > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>👨‍🎓 Emri i Studentit</th>
                            <th>🆔 ID Numri</th>
                            <th>📖 Semestri</th>
                            <th>📅 Data e Regjistrimit</th>
                            <th>📚 Lëndët</th>
                            <th>📝 Përshkrimi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><span class="student-name"><?php echo htmlspecialchars($row["emri_studentit"]); ?></span></td>
                                <td><span class="id-badge"><?php echo htmlspecialchars($row["numri_id"]); ?></span></td>
                                <td><span class="semester-badge">Semestri <?php echo htmlspecialchars($row["semestri"]); ?></span></td>
                                <td><span class="date-text">📅 <?php echo htmlspecialchars($row["data_regjistrimit"]); ?></span></td>
                                <td><span class="subjects-list"><?php echo htmlspecialchars($row["lendet"]); ?></span></td>
                                <td><span class="description-text"><?php echo htmlspecialchars($row["pershkrimi"]); ?></span></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📭</div>
                    <h3 class="empty-title">Nuk ka regjistrime akoma!</h3>
                    <p class="empty-text">Filloni regjistrimin tuaj të parë të semestrit nga faqja kryesore.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $conn->close(); ?>

</body>
</html>