<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">Nombre:</label>
    <input placeholder="Nombre Vendedor(a)" type="text" id="nombre" name="vendedor[nombre]" value="<?= s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input placeholder="Apellido Vendedor(a)" type="text" id="apellido" name="vendedor[apellido]" value="<?= s($vendedor->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>

    <label for="apellido">Telefono:</label>
    <input placeholder="Telefono Vendedor(a)" type="text" id="telefono" name="vendedor[telefono]" value="<?= s($vendedor->telefono); ?>">
</fieldset>