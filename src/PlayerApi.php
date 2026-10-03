<?php

namespace App;

class PlayerApi
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function getPlayers(): array
    {
        if (!file_exists($this->file)) {
            throw new \Exception('Файл з даними не знайдено.');
        }

        $json = file_get_contents($this->file);

        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Помилка читання JSON.');
        }

        return $data;
    }
}