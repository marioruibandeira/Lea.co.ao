<?php

class LojaController extends Controller {

    public function index(): void {
        $this->render('loja/index', []);
    }

    public function certificacao(): void {
        $this->render('loja/certificacao', [
			'seoTitulo'    => 'Certificação de Artistas — LEA Angola',
			'seoDescricao' => 'Certifica-te como artista real na LEA e destaca-te com o selo de verificação azul. Adere ao pacote básico e cria a tua conta oficial.',
			'seoKeywords'  => 'certificação artista angola, artista verificado angola, lea certificação, selo verificação artista angolano',
			'seoImagem'    => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical' => 'https://lea.co.ao/loja/certificacao',
			'ogType'       => 'website',
			'cssExtra'     => ['/assets/css/paginas/certificacao.css'],
		]);
    }
}