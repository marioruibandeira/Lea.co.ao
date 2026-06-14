<?php

class Router{

    public  function dispatch(): void{
        $uri = $this->getUri();
		
		// Rota dinâmica — leitura de notícia
		if (preg_match('#^/noticias/([a-z0-9-]+)/([a-z0-9-]+-(\d+))$#u', $uri, $m)) {
			$_GET['categoria_slug'] = $m[1];
			$_GET['noticia_slug']   = $m[2];
			$_GET['id']             = $m[3];
			$this->load('NoticiasController', 'leitura');
			return;
		}

        switch ($uri){
            case '':
			
            case '/':
                $this->load('HomeController', 'index');
                break;
				
			case '/loja/certificacao':
				$this->load('LojaController', 'certificacao');
				break;
				
			case '/noticias':
			case '/noticias/noticias':
				$this->load('NoticiasController', 'noticias');
				break;
			
			/*case '/noticias/noticias':
                $this->load('NoticiasController', 'noticias');
                break;
				
			case '/noticias/leitura':
                $this->load('NoticiasController', 'leitura');
                break;*/
				
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
