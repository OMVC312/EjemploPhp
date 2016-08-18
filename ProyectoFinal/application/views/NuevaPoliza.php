<div class="container">
    <form class="form-horizontal" method="POST" action="pgRegistrarPoliza">
        <div class="col-xs-7">
            <h1>Nueva Poliza</h1>
            <label>Nombre</label>
            <input type="text" class="form-control" name="txtNombre" 
                   placeholder="Escribe el nombre del dueño" /><br>
            <label>Correo</label>
            <input type="email" class="form-control" name="txtCorreo"
                   placeholder="Escribe el correo del dueño" /><br>
            <label>Telefono</label>
            <input type="tel" class="form-control" name="txtTelefono"
                   placeholder="Escribe el teléfono del dueño" /><br>
            <label>Dirección</label>
            <input type="text" class="form-control" name="txtDireccion"
                   placeholder="Escribe la direccion del dueño" /><br>
            <label>Aseguradora</label>
            <select name="dpnAseguradora" class="form-control">
                <?php 
                foreach ($arrAseg as $aseg){
                    echo "<option value='$aseg->idAseguradora'>$aseg->idAseguradora- $aseg->nombre</option>";
                }
                ?>
            </select><br>
            <label>Marca</label>
            <input type="text" class="form-control" name="txtMarca"
                   placeholder="Escribe la marca del carro" /><br>
            <label>Modelo</label>
            <input type="text" class="form-control" name="txtModelo"
                   placeholder="Escribe el modelo del carro" /><br>
            <label>Color</label>
            <input type="text" class="form-control" name="txtColor"
                   placeholder="Escribe el color del carro" /><br>
            <label>Año</label>
            <input type="text" class="form-control" name="txtAnio"
                   placeholder="Escribe el año del carro"/><br>
            <label>Placas</label>
            <input type="text" class="form-control" name="txtPlacas"
                   placeholder="Escribe las placas del carro"/><br>
            <input type="submit" class="btn btn-primary" value="Registrar Poliza" 
                   name="btnRegistrarPoliza" />
        </div>
    </form>
</div>