<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="<?=$album['url_capa']?>" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">
                <?=$album['titulo']?>:
                <?=$album['subtitulo']?>
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="ver.php?codigo=<?=$album['cod_album']?>" class="btn btn-sm btn-outline-secondary">
                        Ver
                    </a>
                </div>
                <small class="text-muted">
                    <?=$album['estilo']?>
                </small>
            </div>
        </div>
    </div>
</div>