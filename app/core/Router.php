<?php

class Router{

    public  function dispatch(): void{
        $uri = $this->getUri();

        switch ($uri){
            case '':
			
            case '/':
                $this->load('HomeController', 'index');
                break;
				
			case '/loja/certificacao':
				$this->load('LojaController', 'certificacao');
				break;
				
			case '/noticias/noticias':
                $this->load('NoticiasController', 'noticias');
                break;
				
			case '/noticias/leitura':
                $this->load('NoticiasController', 'leitura');
                break;
				

            /*case '/artes':
                $this->load('ArteController', 'index');
                break;

            case '/artistas':
                $this->load('ArtistaController', 'index');
                break;

            */

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
