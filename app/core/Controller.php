<?php

class Controller {

    protected function render(string $view, array $data = []): void {
        extract($data);
        require_once "views/layouts/header.php";
        require_once "views/{$view}.php";
        require_once "views/layouts/footer.php";
    }

    protected function redirect(string $url): void {
        header("Location: {$url}");
        exit;
    }
}