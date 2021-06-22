<?php
include __DIR__.'/vendor/autoload.php';

$controller = new \App\Index();
$vars = $controller->ver();

$controller->imprimirLayoutInicio();
?>

<main role="main" class="pb-3">
<?php if ($vars['album']): ?>

    <?=$controller->imprimirJumbotron(
        $vars['album']['titulo'],
        $vars['album']['subtitulo'],
        $vars['estilos'],
        $vars['album']['cod_estilo']
    )?>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-0">
                <img class="w-100 img img-fluid" src="<?=$vars['album']['url_capa']?>" alt="Capa do Álbum" />
            </div>
            <div class="col-sm-8">
                <div class="album p-2 bg-light">
                    <div class="container">
                        <div class="row">
                            <ul id="lista-musicas" class="list-group w-100">
                                <?php foreach ($vars['musicas'] as $musica): ?>
                                    <li data-musica="<?=$musica['cod_musica']?>" class="list-group-item">
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">
                                                    <?=$musica['titulo']?>
                                                </h5>
                                            </div>
                                            <small>
                                                <a class="link-voto" data-voto="1" data-musica="<?=$musica['cod_musica']?>" href="#">
                                                    <img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />
                                                </a>
                                                <a class="link-voto" data-voto="2" data-musica="<?=$musica['cod_musica']?>" href="#">
                                                    <img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />
                                                </a>
                                                <a class="link-voto" data-voto="3" data-musica="<?=$musica['cod_musica']?>" href="#">
                                                    <img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />
                                                </a>
                                                <a class="link-voto" data-voto="4" data-musica="<?=$musica['cod_musica']?>" href="#">
                                                    <img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />
                                                </a>
                                                <a class="link-voto" data-voto="5" data-musica="<?=$musica['cod_musica']?>" href="#">
                                                    <img width=40 src="https://images.emojiterra.com/mozilla/512px/2b50.png" />
                                                </a>
                                            </small>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">Álbum não encontrado</div>
        </div>
    </div>

<?php endif; ?>
</main>

<script>
    var links = document.querySelectorAll('a.link-voto');
    for(i=0; i<links.length; i++){
        links[i].addEventListener("click", function(e) {
            e.preventDefault();
            var voto = e.currentTarget.getAttribute('data-voto');
            var musica = e.currentTarget.getAttribute('data-musica');

            votos = recuperarVotos();
            votos[musica] = voto;
            localStorage.setItem('votos', JSON.stringify(votos));

            atualizarVotos(musica, voto);
        });
    }

    var musicas = document.querySelectorAll('ul#lista-musicas li');
    var votos = recuperarVotos();

    for (i=0; i<musicas.length; i++) {
        var musica = musicas[i].getAttribute('data-musica');
        var voto = votos[musica];

        if (voto >= 1) {
            atualizarVotos(musica, voto);
        }
    }

    function recuperarVotos() {
        votos = localStorage.getItem('votos') ?? '{}';
        votos = JSON.parse(votos);
        return votos;
    }

    function atualizarVotos(musica, voto) {
        var elemento_li = document.querySelector('ul#lista-musicas li[data-musica="' + musica + '"]');
        var imgs = elemento_li.querySelectorAll('img');
        for (j=0; j<imgs.length; j++) {
            var img = imgs[j];
            if (j < voto) {
                img.setAttribute('src', 'https://images.emojiterra.com/google/android-10/512px/2b50.png');
            } else {
                img.setAttribute('src', 'https://images.emojiterra.com/mozilla/512px/2b50.png');
            }
        }
    }
</script>

<?php $controller->imprimirLayoutTermino()?>
