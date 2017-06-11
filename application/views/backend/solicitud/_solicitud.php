<!--A.M.D.G.-->
<div class="container">
    <!--BUSCADOR-->
    <form action="" name="buscar-solicitud" class="form-horizontal">
        <div class="form-inline col-md-10">
            <div class="form-group col-md-4">
                <label for="cedula">C&eacute;dula: </label>
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Ingrese C&eacute;dula"/>
            </div>
            <div class="form-group col-md-4">
                <label for="parroquia">Parroquia: </label>
                <input class="form-control" type="text" name="parroquia" id="parroquia" placeholder="Indique Parroquia"/>
            </div>
            <div class="btn-group col-md-2">
                <input class="btn btn-info" type="submit" name="btn-buscar" id="btn-buscar" value="Buscar"/>
            </div>
        </div>
    </form>
    <!--TABLA DE SOLICITUDES-->
    <table class="table table-stripped tbl-index">
        <thead>
        <tr>
            <th>Solicitante</th>
            <th>Parroquia</th>
            <th>Fecha de Ingreso</th>
            <th>Fecha Salida</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>