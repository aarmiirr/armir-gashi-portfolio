<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakulteti i Filozofisë dhe Mendimit Kritik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0e7490 0%, #06b6d4 50%, #0891b2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background */
        .background-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            width: 200%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.05), 
                transparent);
            animation: wave 15s linear infinite;
        }

        .wave:nth-child(2) {
            animation-delay: 5s;
            opacity: 0.5;
        }

        .wave:nth-child(3) {
            animation-delay: 10s;
            opacity: 0.3;
        }

        @keyframes wave {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .floating-circles {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .circle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }

        .circle:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 60%;
            left: 80%;
            animation-delay: 4s;
        }

        .circle:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 20%;
            animation-delay: 2s;
        }

        .circle:nth-child(4) {
            width: 180px;
            height: 180px;
            top: 30%;
            left: 70%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) scale(1);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-50px) scale(1.1);
                opacity: 0.6;
            }
        }

        /* Main content */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        .header-section {
            text-align: center;
            padding: 80px 20px 50px;
            animation: fadeInDown 1s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section h1 {
            color: white;
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            letter-spacing: -1px;
        }

        .header-section h2 {
            color: rgba(255, 255, 255, 0.95);
            font-size: 26px;
            font-weight: 400;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .main-container {
            max-width: 750px;
            margin: 0 auto 50px;
            padding: 0 20px;
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

        .welcome-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 60px 50px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .welcome-card p {
            font-size: 22px;
            color: #334155;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 500;
        }

        .button-container {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 50px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            text-decoration: none;
            font-size: 19px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(6, 182, 212, 0.4);
            position: relative;
            overflow: hidden;
            min-width: 180px;
            text-align: center;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(6, 182, 212, 0.6);
        }

        .btn:active {
            transform: translateY(-2px) scale(1.02);
        }

        .history-section {
            max-width: 950px;
            margin: 60px auto;
            padding: 0 20px;
            animation: fadeIn 1.2s ease-out 0.6s both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .history-section h2 {
            text-align: center;
            color: white;
            font-size: 42px;
            margin-bottom: 50px;
            font-weight: 700;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .history-buttons {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .history-btn {
            padding: 16px 35px;
            background: white;
            color: #0891b2;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 17px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border: 2px solid transparent;
        }

        .history-btn:hover {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            border-color: white;
        }

        .history-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            padding: 45px;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin: 25px auto;
            display: none;
            animation: cardSlideIn 0.5s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        @keyframes cardSlideIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .history-card.active {
            display: block;
        }

        .history-content p {
            font-size: 18px;
            color: #475569;
            line-height: 1.9;
            text-align: justify;
        }

        .footer {
            text-align: center;
            padding: 40px 20px;
            color: white;
            font-size: 16px;
            opacity: 0.9;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .header-section h1 {
                font-size: 36px;
            }

            .header-section h2 {
                font-size: 20px;
            }

            .welcome-card {
                padding: 40px 30px;
            }

            .welcome-card p {
                font-size: 19px;
            }

            .button-container {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .history-section h2 {
                font-size: 32px;
            }

            .history-buttons {
                flex-direction: column;
            }

            .history-btn {
                width: 100%;
                text-align: center;
            }

            .history-card {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="background-animation">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="floating-circles">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="header-section">
            <h1>Fakulteti i Filozofisë dhe Mendimit Kritik</h1>
            <h2>Rruga drejt Dijes dhe Dritës</h2>
        </div>

        <div class="main-container">
            <div class="welcome-card">
                <p>Ju lutem zgjidhni një opsion për të vazhduar:</p>
                <div class="button-container">
                    <a href="login.php" class="btn">Kyçu</a>
                    <a href="register.php" class="btn">Regjistrohu</a>
                </div>
            </div>
        </div>

        <div class="history-section">
            <h2>Historia e Fakultetit</h2>
            <div class="history-buttons">
                <a href="javascript:void(0);" class="history-btn" onclick="toggleHistory('history1')">📜 Themelimi</a>
                <a href="javascript:void(0);" class="history-btn" onclick="toggleHistory('history2')">🌍 Roli në Shoqëri</a>
                <a href="javascript:void(0);" class="history-btn" onclick="toggleHistory('history3')">🎓 Tradita Akademike</a>
            </div>

            <div class="history-card" id="history1">
                <div class="history-content">
                    <p>Fakulteti i Filozofisë dhe Mendimit Kritik u themelua në vitin 1995 me qëllimin për të avancuar studimet e filozofisë dhe për të nxitur mendimin kritik te studentët. Ky fakultet është një nga institucionet kryesore që ofron një program të gjerë të studimeve filozofike, duke përfshirë tematika të tilla si etika, logjika, ontologjia dhe filozofia e mendimit kritik.</p>
                </div>
            </div>

            <div class="history-card" id="history2">
                <div class="history-content">
                    <p>Fakulteti ka luajtur një rol të rëndësishëm në zhvillimin intelektual të shoqërisë dhe ka kontribuar në formimin e shumë studiuesve dhe filozofëve të njohur. Profesorët e fakultetit janë të njohur për angazhimin e tyre në hulumtime të thella dhe për rolin e tyre në formimin e mendimtarëve të ardhshëm që do të ndikojnë në fushat e filozofisë, sociologjisë dhe shkencave humane.</p>
                </div>
            </div>

            <div class="history-card" id="history3">
                <div class="history-content">
                    <p>Me një histori të pasur dhe një traditë të shkëlqyer akademike, Fakulteti i Filozofisë dhe Mendimit Kritik vazhdon të jetë një lider në fushën e studimeve filozofike, duke ofruar një mjedis që mbështet zhvillimin e ideve të reja dhe diskutimeve intelektuale.</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2025 Të drejtat e autorit janë të mbrojtura.</p>
        </div>
    </div>

    <script>
        function toggleHistory(id) {
            const element = document.getElementById(id);
            const allCards = document.querySelectorAll('.history-card');
            
            allCards.forEach(card => {
                if (card.id === id) {
                    card.classList.toggle('active');
                } else {
                    card.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>