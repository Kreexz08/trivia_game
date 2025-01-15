<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia Games</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page-wrapper">
        <header>
            <nav class="navbar">
                <div class="logo">
                    <h1>🎮 Trivia Games</h1>
                </div>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <p>&copy; <?= date('Y') ?> Trivia Games. ¡Diviertete aprendiendo!</p>
        </footer>
    </div>
</body>
</html>