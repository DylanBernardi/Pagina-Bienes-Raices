<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad): ?>
        <div class="anuncio">
            <img src="/imagenes/<?= $propiedad->imagen ?>" loading="lazy" alt="anuncio">
            <div class="contenido-anuncio">
                <h3><?= $propiedad->titulo ?></h3>
                <p>
                    <?= truncate($propiedad->descripcion, 30); ?>
                </p>
                <p class="precio">$<?= $propiedad->precio ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-anuncio"
                            loading="lazy"
                            src="build/img/icono_wc.svg"
                            alt="icono wc" />
                        <p><?= $propiedad->wc ?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio"
                            loading="lazy"
                            src="build/img/icono_estacionamiento.svg"
                            alt="icono estacionamiento" />
                        <p><?= $propiedad->estacionamiento ?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio"
                            loading="lazy"
                            src="build/img/icono_dormitorio.svg"
                            alt="icono habitaciones" />
                        <p><?= $propiedad->habitaciones ?></p>
                    </li>
                </ul>
                <a class="boton-amarillo-block" href="/propiedad?id=<?= $propiedad->id ?>">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach ?>
</div>