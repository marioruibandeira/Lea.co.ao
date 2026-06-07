<?php


class HomeController  extends Controller
{
    private HomeDAO $homeDAO;

    public function __construct() {
        $this->homeDAO = new HomeDAO();
    }

    public function index(): void {
        $heroTexto = $this->homeDAO->getHeroTexto();
        $categoriasHero = $this->homeDAO->getCategoriasHero();
        $categorias     = $this->homeDAO->getCategorias();
        $categoriasMobile = $this->homeDAO->getCategoriasMobile();
        $artistasDestaque = $this->homeDAO->getArtistasDestaque();
        $noticiaDestaque = $this->homeDAO->getNoticiaDestaque();
        $noticiasLista   = $this->homeDAO->getNoticiasLista($noticiaDestaque['id_noticias'] ?? 0);
        $getArtistasRecemAdicionados = $this->homeDAO->getArtistasRecemAdicionados();
        $testemunhos = $this->homeDAO->getTestemunhos();

        $this->render('home/index', [
            'heroTexto' => $heroTexto,
            'categoriasHero' => $categoriasHero,
            'categorias'     => $categorias,
            'categoriasMobile' => $categoriasMobile,
            'artistasDestaque' => $artistasDestaque,
            'noticiaDestaque'  => $noticiaDestaque,
            'noticiasLista'    => $noticiasLista,
            'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
            'testemunhos'      => $testemunhos
        ]);
    }
}