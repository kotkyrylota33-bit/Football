 <?php

require_once __DIR__ . '/vendor/autoload.php';

use App\PlayerApi;

header('Content-Type: application/json; charset=UTF-8');

try {

    $api = new PlayerApi(__DIR__ . '/data.json');

    $players = $api->getPlayers();

    echo json_encode(
        $players,
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

} catch (Exception $e) {

    http_response_code(500);

    echo json_encode([
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}