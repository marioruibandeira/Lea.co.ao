<?php

class Router {

    public function dispatch(): void {
        $uri = $this->getUri();

        // ── Notícias: leitura de notícia ──
        if (preg_match('#^/noticias/([a-z0-9-]+)/([a-z0-9-]+-(\d+))$#u', $uri, $m)) {
            $_GET['categoria_slug'] = $m[1];
            $_GET['noticia_slug']   = $m[2];
            $_GET['id']             = $m[3];
            $this->load('NoticiasController', 'leitura');
            return;
        }

        // ── Notícias: categoria ──
        if (preg_match('#^/noticias/categoria/([a-z0-9-]+)$#u', $uri, $m)) {
            $_GET['categoria_slug'] = $m[1];
            $this->load('NoticiasController', 'categoria');
            return;
        }

        // ── Notícias: tag ──
        if (preg_match('#^/noticias/tag/([^/]+)$#u', $uri, $m)) {
            $_GET['tag'] = urldecode($m[1]);
            $this->load('NoticiasController', 'tag');
            return;
        }

        // ── Artistas: páginas especiais ──
        if ($uri === '/artistas/aniversarios') {
            $this->load('ArtistasController', 'aniversarios');
            return;
        }
        if ($uri === '/artistas/obituario') {
            $this->load('ArtistasController', 'obituario');
            return;
        }

        // ── Artistas: categoria ──
        if (preg_match('#^/artistas/([a-z0-9-]+)$#u', $uri, $m)) {
            $_GET['categoria_slug'] = $m[1];
            $this->load('ArtistasController', 'categoria');
            return;
        }

        // ── Artista: seguir (tem de vir ANTES do perfil) ──
        if ($uri === '/artista/seguir') {
            $this->load('ArtistaController', 'seguir');
            return;
        }
		
		// ── Artista: curtir (tem de vir ANTES do perfil) ──
		if ($uri === '/artista/curtir') {
			$this->load('ArtistaController', 'curtir');
			return;
		}
		
		// ── Artista: faixas de um álbum (AJAX) ──
		if ($uri === '/artista/faixas') {
			$this->load('ArtistaController', 'faixasAlbum');
			return;
		}

        // ── Artista: perfil com ID (/artista/gerilson-israel-475) ──
        if (preg_match('#^/artista/([a-z0-9-]+-(\d+))$#u', $uri, $m)) {
            $_GET['id']   = $m[2];
            $_GET['slug'] = $m[1];
            $this->load('ArtistaController', 'perfil');
            return;
        }

        // ── Artista: perfil sem ID (/artista/gerilson-israel) ──
        if (preg_match('#^/artista/([a-z0-9-]+)$#u', $uri, $m)) {
            $_GET['slug'] = $m[1];
            $this->load('ArtistaController', 'perfil');
            return;
        }
		
		

        // ── Rotas estáticas ──
        switch ($uri) {
            case '':
            case '/':
                $this->load('HomeController', 'index');
                break;

            case '/artes':
                $this->load('ArtesController', 'artes');
                break;

            case '/artes/categoria':
                $this->load('ArtesController', 'categoria');
                break;

            case '/artistas':
                $this->load('ArtistasController', 'artistas');
                break;

            case '/artista':
                $this->load('ArtistaController', 'artista');
                break;

            case '/loja/certificacao':
                $this->load('LojaController', 'certificacao');
                break;

            case '/pesquisa':
                $this->load('PesquisaController', 'index');
                break;

            case '/pesquisa/mais':
                $this->load('PesquisaController', 'mais');
                break;

            case '/noticias':
            case '/noticias/noticias':
                $this->load('NoticiasController', 'noticias');
                break;

            default:
                $this->load('ErrorController', 'notFound');
                break;
        }
    }

    private function getUri(): string {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        $uri = str_replace('/index.php', '', $uri);
        return $uri === '' ? '/' : $uri;
    }

    private function load(string $controller, string $method): void {
        $ctrl = new $controller();
        $ctrl->$method();
    }
}