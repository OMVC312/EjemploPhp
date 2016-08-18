<div class="container">
    <form class="form-horizontal" method="POST" action="pgActualizarPoliza">
        <div class="col-xs-7">
            <h1>Editar Poliza</h1>
            <label>Nombre</label>
            <input type="text" class="form-control" name="txtNombre" value="<?php echo $poliza->nombre; ?>"
                   placeholder="Escribe el nombre del dueño" /><br>
            <label>Correo</label>
            <input type="email" class="form-control" name="txtCorreo" value="<?php echo $poliza->correo; ?>"
                   placeholder="Escribe el correo del dueño" /><br>
            <label>Telefono</label>
            <input type="tel" class="form-control" name="txtTelefono" value="<?php echo $poliza->telefono; ?>"
                   placeholder="Escribe el teléfono del dueño" /><br>
            <label>Dirección</label>
            <input type="text" class="form-control" name="txtDireccion" value="<?php echo $poliza->direccion; ?>"
                   placeholder="Escribe la direccion del dueño" /><br>
            <label>Aseguradora</label>
            <select name="dpnAseguradora" class="form-control">
                <option value="<?php echo $poliza->aseguradora; ?>"> aseguradora <?php echo $poliza->aseguradora; ?></option>
                <?php 
                foreach ($arrAseg as $aseg){
                    echo "<option value='$aseg->idAseguradora'>$aseg->idAseguradora- $aseg->nombre</option>";
                }
                ?>
            </select><br>
            <label>Marca</label>
            <input type="text" class="form-control" name="txtMarca" value="<?php echo $poliza->marca; ?>"
                   placeholder="Escribe la marca del carro" /><br>
            <label>Modelo</label>
            <input type="text" class="form-control" name="txtModelo" value="<?php echo $poliza->modelo; ?>"
                   placeholder="Escribe el modelo del carro" /><br>
            <label>Color</label>
            <input type="text" class="form-control" name="txtColor" value="<?php echo $poliza->color; ?>"
                   placeholder="Escribe el color del carro" /><br>
            <label>Año</label>
            <input type="text" class="form-control" name="txtAnio" value="<?php echo $poliza->anio; ?>"
                   placeholder="Escribe el año del carro"/><br>
            <label>Placas</label>
            <input type="text" class="form-control" name="txtPlacas" value="<?php echo $poliza->placas; ?>"
                   placeholder="Escribe las placas del carro"/><br>
            <input type="hidden" name="txtIdPoliza" value="<?php echo $idPoliza; ?>" />
            <input type="submit" class="btn btn-primary" value="Actualizar Poliza" 
                   name="btnActualizarPoliza" />
        </div>
    </form>
</div>