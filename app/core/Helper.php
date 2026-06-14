<?php

class Helper {

    public static function slug(string $texto): string {
        $texto = mb_strtolower($texto, 'UTF-8');
        $texto = str_replace(
            ['á','à','â','ã','ä','å','é','è','ê','ë','í','ì','î','ï','ó','ò','ô','õ','ö','ú','ù','û','ü','ç','ñ'],
            ['a','a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','c','n'],
            $texto
        );
        $texto = preg_replace('/[^a-z0-9\s-]/', '', $texto);
        $texto = preg_replace('/[\s-]+/', '-', $texto);
        return trim($texto, '-');
    }

    public static function noticiaUrl(array $noticia): string {
        $categoriaSlug = self::slug($noticia['categoria_noticias']);
        $temaSlug      = self::slug($noticia['tema']);
        // Limitar o slug do tema a 60 caracteres
        $temaSlug = substr($temaSlug, 0, 60);
        $temaSlug = rtrim($temaSlug, '-');
        return "/noticias/{$categoriaSlug}/{$temaSlug}-{$noticia['id_noticias']}";
    }
}