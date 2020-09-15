<?php
namespace Dados;

class Estrela
{
    static function converterEstrelasImagem($voto = 0, $album)
    {
        if (!in_array($voto, range(0,5))) {
            return;
        }
        $imgTemplate = '<img width=40 src="https://images.emojiterra.com/google/android-10/512px/2b50.png" />';
        $imgTemplate2 = '<img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />';
        $html = null;
        for($i=1; $i<=$voto; $i++) {
            $template = "<a href='votar.php?album=%s&voto=%s'>"
                . $imgTemplate . "</a>";
            $html .= sprintf($template, $album, $i);
        }
        for($j=5; $j>=$i; $j--) {
            $template = "<a href='votar.php?album=%s&voto=%s'>"
                . $imgTemplate2 . "</a>";
            $html .= sprintf($template, $album, $i);
        }

        return $html;
    }
}