<?php


    $ce_usuario = isset($_POST['ce_usuario']) ? trim($_POST['ce_usuario']) : '';
    $ce_artista = isset($_POST['ce_artista']) ? trim($_POST['ce_artista']) : '';
    $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
    $genero_id = isset($_POST['genero_id']) ? trim($_POST['genero_id']) : '';
    $ano = isset($_POST['ano']) ? trim($_POST['ano']) : '';
    $musica = isset($_POST['musica']) ? trim($_POST['musica']) : '';
    $capa = isset($_POST['capa']) ? trim($_POST['capa']) : '';
    
    echo json_encode([
        'ce_usuario' => $ce_usuario,
        'ce_artista' => $ce_artista,
        'titulo' => $titulo,
        'genero_id' => $genero_id,
        'ano' => $ano,
        'capa' => $capa,
    ]);

    
?>