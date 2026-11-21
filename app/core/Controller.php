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
	
	protected function artistaDestaque(): array
	{
		$artista = (new ArtistasDAO())->getArtistaAleatorio();
		$jaSegue = false;

		if ($artista) {
			include_once $_SERVER['DOCUMENT_ROOT'] . '/nasocial/logica/login/Login.php';
			$login  = new Login();
			$logado = $_COOKIE['user_logged'] ?? null;

			if ($logado && $login->VerificarSessionID($logado) === 1) {
				$utilizadorId = (int) $login->VerificarUserAccount_($logado);
				include_once __DIR__ . '/../dao/ArtistaDAO.php'; // ajusta ao sítio onde a classe base está
				$jaSegue = (new ArtistaDAO())->jaSegue((int) $artista['artID'], $utilizadorId);
			}
		}

		return [$artista, $jaSegue];
	}
	
	protected function utilizadorLogadoId(): ?int
	{
		include_once $_SERVER['DOCUMENT_ROOT'] . '/nasocial/logica/login/Login.php';
		$login  = new Login();
		$logado = $_COOKIE['user_logged'] ?? null;

		if ($logado && $login->VerificarSessionID($logado) === 1) {
			return (int) $login->VerificarUserAccount_($logado);
		}
		return null;
	}
}