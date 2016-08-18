<div class="container">
    <form class="form-horizontal" method="POST" action="pgRegistrarSiniestro">
        <div class="col-xs-7">
            <h1>Nuevo Siniestro</h1>
            <label>Número de Poliza</label>
            <input type="text" class="form-control" name="txtPoliza" 
                   placeholder="Escribe el numero de la poliza" /><br>
            <label>Responsable</label>
            <select name="dpnResponsable" class="form-control">
                <option>Dueño del carro</option>
                <option>Terceras personas</option>
                <option>Accidente</option>
                <option>Por definir</option>
            </select>
            <br>
            <label>Costo Aproximado</label>
            <input type="text" class="form-control" name="txtCostoAprox"
                   placeholder="Escribe el costo aproximado" /><br>
            <label>Observaciones</label>
            <textarea class="form-control" name="txtObservaciones" rows="4" cols="20"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Registrar Siniestro" 
                   name="btnRegistrarSiniestro" />
        </div>
    </form>
</div>