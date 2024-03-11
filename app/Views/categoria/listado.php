
                        <button  class="btn btn-primary" id="btAddSubC" onclick="openAddCategoriaModal();">
                                <i class="fa fa-plus-circle"></i>
                                <b>Nueva</b>
                            </button>
                            <br/><br/>
                               <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                     <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>

                <div class="modal fade" id="remModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">¿Realmente desea Eliminar la Categoría?</div>
                                <input type="hidden" name="idRegistro" id="idRegistro"/>
                                <div class="alert alert-danger" id="delete-alert" role="alert">
                                        <div id="msgalert"></div>
                                    </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-danger" href="javascript:delCategoria()">SI Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>                 


                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body"><div id="contentDiv"></div></div>
                                
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" href="javascript:clickEditCategoria()">Actualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoría</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body"><div id="contentDivAdd"></div></div>
                                
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" href="javascript:clickAddCategoria()">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div> 


<script type="text/javascript">
     
    $('#tabla').DataTable({
        "ajax":  "categoria/json_getlistado",
        "rowId": "dt_rowid",
        "columns": [
            {"data": "id"},
            {"data": "descripcion"},
            {"data": "id"},
        ],
        "columnDefs": [{
                "targets": 2,
                "data": "id",
                "className": "text-center",
                "render": function (data, type, row, meta) {
                    return '<a href="javascript:openEditCategoriaModal(' + data + ')">'
                            + '<i class="fa fa-pencil-square-o fa-2x" alt="Editar Categoría" aria-hidden="true"></i></a>  '
                            + '<a href="javascript:dialogrem(' + data + ')">'
                            + '<i class="fa fa-times fa-2x" style="color: red;" alt="Eliminar Categoría" aria-hidden="true"></i></a>  '
                            
                    ;
                }
            }]
        
    });


     function openAddCategoriaModal() {
   
        $.ajax({
            url: 'categoria/vista_agregar',
        }).done(function (data) {
            //alert(data);
            $("#contentDivAdd").html(data);
            $('#addModal').modal('show');
        });
    }

    function clickAddCategoria(){
    $("#frmMainAddC").addClass("was-validated")  
    
    if ($("#frmMainAddC")[0].checkValidity()) {
          $("#frmMainAddC").addClass("was-validated")
         
          insertCategoria();
         
    }
  }

  function openEditCategoriaModal(idc) {
   
   $.ajax({
       url: 'categoria/vista_editar/' + idc,
   }).done(function (data) {
       $("#contentDiv").html(data);
       $('#editModal').modal('show');
   });
}



 function clickEditCategoria(){
   $("#frmMainUpdC").addClass("was-validated")
   
   if ($("#frmMainUpdC")[0].checkValidity()) {
         $("#frmMainUpdC").addClass("was-validated")
         updateCategoria();
        
   }
 }

  function insertCategoria() {
    
    $.ajax({
        dataType: "json",
        url: "categoria/create" ,
        type: "POST",
        data: {
            descripcion: $("#regDescripcion").val()
        }
    }).done(function (data) {

        var tbSubCatEdit = $('#tabla').DataTable();
        tbSubCatEdit.ajax.reload( null, false ); 
        $('#addModal').modal('hide');
        
    }).fail(function (data) {

        if(data.responseJSON.error)
            $("#msg_add_alert").html(data.responseJSON.error);
        else{
            var validaciones = data.responseJSON.validaciones;
            var msgerror="<b>Validaciones</b><br/>";
            for (var i = 0; i < validaciones.length; i++) 
                msgerror = msgerror + validaciones[i].mensaje  + "<br/>";
            $("#msg_add_alert").html(msgerror);
        }

        $("#add-alert").fadeTo(5000, 500).slideUp(500, function() {
                $("#add-alert").slideUp(500);
        });

    });

}

function updateCategoria() {
  $.ajax({
      dataType: "json",
      url: "categoria/update/" +  $("#idc").val() ,
      type: "POST",
      data: {
          descripcion: $("#regDescripcion").val()
      }
  }).done(function (data) {

      var tbSubCatEdit = $('#tabla').DataTable();
      tbSubCatEdit.ajax.reload( null, false ); 
      $('#editModal').modal('hide');
      
  }).fail(function (data) {

      if(data.responseJSON.error)
          $("#msgalert").html(data.responseJSON.error);
      else{
          var validaciones = data.responseJSON.validaciones;
          var msgerror="<b>Validaciones</b><br/>";
          for (var i = 0; i < validaciones.length; i++) 
              msgerror = msgerror + validaciones[i].mensaje  + "<br/>";
          $("#msgalert").html(msgerror);
      }

      $("#error-alert").fadeTo(5000, 500).slideUp(500, function() {
              $("#error-alert").slideUp(500);
      });

  });

}

function delCategoria() {
  $.ajax({
      dataType: "json",
      url: "categoria/delete/" +  $("#idRegistro").val() ,
      type: "POST"
  }).done(function (data) {

      var tbSubCatEdit = $('#tabla').DataTable();
      tbSubCatEdit.ajax.reload( null, false ); 
      $('#remModal').modal('hide');
      
  }).fail(function (data) {

      if(data.responseJSON.error)
          $("#msgalert").html(data.responseJSON.error);

      $("#delete-alert").fadeTo(5000, 500).slideUp(500, function() {
              $("#delete-alert").slideUp(500);
      });

  });
}
    
</script>