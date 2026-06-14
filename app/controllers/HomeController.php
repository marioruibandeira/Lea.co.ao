<?php
class HomeController extends Controller {

    private HomeDAO $homeDAO;

    public function __construct() {
        $this->homeDAO = new HomeDAO();
    }

    public function index(): void {
        $heroTexto                   = $this->homeDAO->getHeroTexto();
        $categoriasHero              = $this->homeDAO->getCategoriasHero();
        $categorias                  = $this->homeDAO->getCategorias();
        $categoriasMobile            = $this->homeDAO->getCategoriasMobile();
        $artistasDestaque            = $this->homeDAO->getArtistasDestaque();
        $noticiaDestaque             = $this->homeDAO->getNoticiaDestaque();
        $noticiasLista               = $this->homeDAO->getNoticiasLista($noticiaDestaque['id_noticias'] ?? 0);
        $getArtistasRecemAdicionados = $this->homeDAO->getArtistasRecemAdicionados();
        $testemunhos                 = $this->homeDAO->getTestemunhos();

        $this->render('home/index', [
            'heroTexto'                => $heroTexto,
            'categoriasHero'           => $categoriasHero,
            'categorias'               => $categorias,
            'categoriasMobile'         => $categoriasMobile,
            'artistasDestaque'         => $artistasDestaque,
            'noticiaDestaque'          => $noticiaDestaque,
            'noticiasLista'            => $noticiasLista,
            'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
            'testemunhos'              => $testemunhos,
            'seoTitulo'                => 'LEA — Plataforma Angolana de Artes',
            'seoDescricao'             => 'Descobre artistas angolanos, músicas, literatura, cinema e muito mais. A maior plataforma de cultura angolana num só lugar.',
            'seoKeywords'              => 'artistas angolanos, música angola, cultura angola, kuduro, semba, kizomba, literatura angolana, cinema angola',
            'seoImagem'                => 'https://lea.co.ao/assets/img/og-default.jpg',
            'seoCanonical'             => 'https://lea.co.ao/',
            'ogType'                   => 'website',
            'cssExtra'                 => [],
        ]);
    }
}