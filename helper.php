<?php

if (!function_exists('env')) {

    function env($key, $default = null)
    {

        $envPath = __DIR__ . '/.env';

        if (!file_exists($envPath)) {
            throw new Exception(".env file not found at: $envPath");
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            [$name, $value] = explode('=', $line, 2);
            $env[trim($name)] = trim($value);
        }

        return $env[$key] ?? $default;
    }

}

?>