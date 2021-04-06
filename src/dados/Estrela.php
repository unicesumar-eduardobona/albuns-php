<?php
namespace Dados;

class Estrela
{
    static function converterEstrelasImagem($voto = 0, $musica)
    {
        if (!in_array($voto, range(0,5))) {
            return;
        }

        $imgTemplate1 = '<img width=40 src="https://images.emojiterra.com/google/android-10/512px/2b50.png" />';
        $imgTemplate2 = '<img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />';

        $html = null;
        for($i=1; $i<=$voto; $i++) {
            $template = "<a href='votar.php?musica=%s&voto=%s'>"
                . $imgTemplate1 . "</a>";
            $html .= sprintf($template, $musica, $i);
        }
        for($j=$i; $j<=5; $j++) {
            $template = "<a href='votar.php?musica=%s&voto=%s'>"
                . $imgTemplate2 . "</a>";
            $html .= sprintf($template, $musica, $j);
        }

        return $html;
    }
}