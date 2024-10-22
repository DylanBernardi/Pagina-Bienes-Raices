 <fieldset>
     <legend>Informacion General</legend>
     <label for="titulo">Titulo:</label>
     <input type="text" placeholder="Titulo Propiedad" id="titulo" name="propiedad[titulo]" value="<?= s($propiedad->titulo); ?>">

     <label for="precio">Precio:</label>
     <input type="number" placeholder="Precio Propiedad" id="precio" name="propiedad[precio]" value="<?= s($propiedad->precio); ?>">

     <label for="imagen">Imagen:</label>
     <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
     <?php if ($propiedad->imagen): ?>
         <img src="/imagenes/<?= $propiedad->imagen ?>" class="imagen-small">
     <?php endif ?>

     <label for=" descripcion">Descripcion</label>
     <textarea id="descripcion" name="propiedad[descripcion]"><?= s($propiedad->descripcion); ?></textarea>
 </fieldset>

 <fieldset>
     <legend>Informacion Propiedad</legend>

     <label for="habitaciones">Habitaciones:</label>
     <input type="number" id="habitaciones" min="1" max="9" name="propiedad[habitaciones]" value="<?= s($propiedad->habitaciones); ?>">

     <label for=" wc">Baños:</label>
     <input type="number" id="wc" min="1" max="9" name="propiedad[wc]" value="<?= s($propiedad->wc); ?>">

     <label for=" estacionamiento">Estacionamiento:</label>
     <input type="number" id="estacionamiento" min="1" max="9" name="propiedad[estacionamiento]" value="<?= s($propiedad->estacionamiento); ?>">

 </fieldset>

 <fieldset>
     <legend>Vendedor</legend>
     <label for="vendedor">Vendedor</label>
     <select name="propiedad[vendedores_id]" id="vendedor">
         <option value="">-- Seleccione --</option>
         <?php foreach ($vendedores as $vendedor) { ?>
             <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id) ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
         <?php } ?>
     </select>
 </fieldset>