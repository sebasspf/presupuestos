<h3>Agregar precio:</h3><br>

                <form class="form-horizontal" method="POST" action="/admin/presupuestos/{{$presupuesto->id}}/precio">
                    <div class="form-group">
                        <label for="producto" class="col-sm-2 control-label">Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="producto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="falla" class="col-sm-2 control-label">Falla:</label>
                        <div class="col-sm-10">
                            <input type="text" name="falla" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="posible" class="col-sm-2 control-label">¿Posible?</label>
                        <div class="col-sm-10">
                            <label class="checkbox-inline">
                                <input type="radio" name="posible" value="1" checked="checked">Sí
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="posible" value="0">No
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio" class="col-md-4 control-label">Precio:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" name="precio" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tiempo" class="col-md-4 control-label">Tiempo (días):</label>
                                <div class="col-md-8">
                                    <input type="text" name="tiempo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button name="enviar" type="submit" class="btn btn-default">Guardar</button>
                        </div>
                    </div>

</form>