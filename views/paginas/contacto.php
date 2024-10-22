<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php if ($mensaje): ?>
        <p class="alerta exito"> <?= $mensaje ?></p>
    <?php endif ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <source srcset="build/img/destacada3.jpg" type="image/jpg" />
        <img
            src="build/img/destacada3.jpg"
            alt="Imagen de contacto"
            loading="lazy" />
    </picture>
    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required />
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" placeholder="Tu Mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input
                type="number"
                placeholder="Tu precio o presupuesto"
                id="presupuesto" name="contacto[precio]" required />
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input
                    type="radio"
                    value="telefono"
                    id="contactar-telefono" name="contacto[contacto]" required />

                <label for="contactar-email">Email</label>
                <input
                    type="radio"
                    value="email"
                    id="contactar-email" name="contacto[contacto]" required />
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
    </form>
</main>