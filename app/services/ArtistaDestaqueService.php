
<?php

class ArtistaDestaqueService
{
    private ArtistasDAO $artistasDAO;
    private ArtistaDAO $artistaDAO;

    public function __construct()
    {
        $this->artistasDAO = new ArtistasDAO();
        $this->artistaDAO = new ArtistaDAO();
    }

    public function obterDados(?int $utilizadorId = null): array
    {
        $artistaDestaque = $this->artistasDAO->getArtistaAleatorio();

        $jaSegueDestaque = false;

        if ($artistaDestaque && $utilizadorId !== null) {
            $jaSegueDestaque = $this->artistaDAO->jaSegue(
                (int) $artistaDestaque['artID'],
                $utilizadorId
            );
        }

        return [
            'artistaDestaque' => $artistaDestaque,
            'jaSegueDestaque' => $jaSegueDestaque
        ];
    }
}
