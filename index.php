 <?php

require_once __DIR__ . '/vendor/autoload.php';

use App\PlayerApi;

try {
    $api = new PlayerApi(__DIR__ . '/data.json');
    $players = $api->getPlayers();
} catch (Exception $e) {
    $players = [];
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Football Players API</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <header>

        <div class="badge">
            LOCAL REST API
        </div>

        <h1>⚽ Football Players</h1>

        <p>
            Дані отримуються з локального PHP API
        </p>

    </header>


    <?php if (isset($error)): ?>

        <div class="error">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php else: ?>

        <div class="player-list">

            <?php foreach ($players as $player): ?>

                <div class="player-item">

                    <div class="player-number">
                        #<?= htmlspecialchars($player['id']) ?>
                    </div>

                    <h2>
                        <?= htmlspecialchars($player['name']) ?>
                    </h2>

                    <div class="info">

                        <p>
                            <span>Клуб</span>
                            <?= htmlspecialchars($player['club']) ?>
                        </p>

                        <p>
                            <span>Позиція</span>
                            <?= htmlspecialchars($player['position']) ?>
                        </p>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="api-info">

        <h3>API endpoint</h3>

        <code>
            http://localhost:8000/api.php
        </code>

    </div>


    <footer>

        PHP + Composer + JSON + Python

    </footer>

</div>

</body>

</html>