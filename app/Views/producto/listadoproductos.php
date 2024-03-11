
                    
                    <table id="tabla" class="table  table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>PVP</th>
                                <th>Impuesto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                         <tfoot>
                            <tr>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>PVP</th>
                                <th>Impuesto</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
                    
                    
                <div class="modal fade" id="remModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">¿Realmente desea Eliminar el producto?</div>
                                <input type="hidden" name="idRegistro" id="idRegistro"/>
                                <div class="alert alert-danger" id="delete-alert" role="alert">
                                        <div id="msgalert"></div>
                                    </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-danger" href="javascript:delProducto()">SI Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>   
                 

    

    <script type="text/javascript">
        showListadoProductos();
        
        function dialogrem(ID) {
                $('#idRegistro').val(ID);
                $("#delete-alert").hide();
                $('#remModal').modal('show');
        }

        function delProducto() {
                $.ajax({
                    url: "producto/delete/" +  $("#idRegistro").val() ,
                }).done(function (data) {

                    var tbProductos = $('#tabla').DataTable();
                    tbProductos.ajax.reload( null, false ); 
                    $('#remModal').modal('hide');
                    
                }).fail(function (jqXHR, textStatus, errorThrown) {

                    if(jqXHR.responseJSON.error)
                        $("#msgalert").html(jqXHR.responseJSON.error);

                    $("#delete-alert").fadeTo(5000, 500).slideUp(500, function() {
                            $("#delete-alert").slideUp(500);
                    });

                });
        }
    </script>

