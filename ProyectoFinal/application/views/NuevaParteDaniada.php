<div class="container">
    <form class="form-horizontal" method="POST" action="pgNuevaParteDaniada">
        <div class="col-xs-7">
            <h1>Partes dañadas</h1>
            <h2>Agregar Partes Dañadas</h2>
            <label>Número de Poliza</label>
            <input type="text" name="txtIdPoliza" value='<?php echo $idPoliza ?>' 
                   class="form-control" readonly="readonly" /><br>
            <label>Id Siniestro</label>
            <input type="text" name="txtIdSiniestro" value='<?php echo $idSiniestro ?>' 
                   class="form-control" readonly="readonly" /><br>
            <label>Piezas</label>
            <select name="dpnParte" class="form-control">
                <?php
                foreach ($partes as $parte) {
                    echo "<option value='$parte->idParte'>$parte->idParte- $parte->nombre</option>";
                }
                ?>
            </select>
            <br>
            <label>Tipo de Daño</label>
            <input type="text" class="form-control" name="txtTipoDanio"
                   placeholder="Escribe el tipo de daño de la parte" /><br>
            <label>Nivel de Daño</label>
            <select name="dpnNivel" class="form-control">
                <option>Muy Alto</option>
                <option>Alto</option>
                <option>Medio</option>
                <option>Bajo</option>
                <option>Muy Bajo</option>
            </select><br>
            <label>Observaciones</label>
            <textarea class="form-control" name="txtObservaciones" rows="4" cols="20"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Registrar Nueva Parte" 
                   name="btnRegistrarNuevaParte" /><br><br>
            <h2>Partes Dañadas del Mismo Siniestro</h2>
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>Id Parte Dañada</th>
                        <th>Parte</th>
                        <th>Siniestro</th>
                        <th>Poliza</th>
                        <th>Tipo de Daño</th>
                        <th>Nivel de Daño</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($partesDanios as $parteDanio){
                echo "
                    <tr>
                        <td>$parteDanio->idPartesDaniadas</td>
                        <td>$parteDanio->parte</td>
                        <td>$parteDanio->siniestro</td>
                        <td>$parteDanio->poliza</td>
                        <td>$parteDanio->tipoDanio</td>
                        <td>$parteDanio->nivel</td>
                        <td>$parteDanio->observaciones</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </form>
</div>