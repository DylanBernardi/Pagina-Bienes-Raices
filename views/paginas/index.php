<main class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>
    <?php include 'iconos.php' ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en venta</h2>

    <?php include 'listado.php' ?>

    <div class="ver-todas alinear-derecha">
        <a href="anuncios.html" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>
        LLena el formulario de contacto y un asesor se pondra en contacto
        contigo a la brevedad
    </p>
</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp" />
                    <source srcset="build/img/blog1.jpg" type="image/jpg" />
                    <img
                        src="build/img/blog1.jpg"
                        alt="texto entrada blog"
                        loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">
                        Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
                    </p>
                    <p>
                        Consejos para construir tu casa con los mejores materiales y
                        ahorrando dinero para tu nueva casa.
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp" />
                    <source srcset="build/img/blog2.jpg" type="image/jpg" />
                    <img
                        src="build/img/blog2.jpg"
                        alt="texto entrada blog"
                        loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">
                        Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
                    </p>
                    <p>
                        Maximisa el espacio en tu hogar con esta guia, aprende a
                        combinar muebles y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atencion y
                la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Dylan Bernardi -</p>
        </div>
    </section>
</div>