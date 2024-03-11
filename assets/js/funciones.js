function fillLista(Url, divID, idItemSelected, addItemAll=false) {
  
  $.ajax({
      url: Url 
  }).done(function (data) {
     
  
     data = JSON.parse(data);
    
     
      if(addItemAll) $("#" + divID).append( "<option value=-1>Seleccione una opción</option>");

      for (var i = 0; i < data.length; i++) {
        
          var opc =  "<option ";
          if (idItemSelected == data[i].id ) opc = opc + " selected ";
          opc = opc + " value=" + data[i].id + ">" + data[i].descripcion + "</option>";
          $("#" + divID).append(opc);
      }

  });
}

function showListadoProductos() {


  $('#tabla').DataTable({

  "ajax":  "producto/getListado",
  "rowId": "dt_rowid",
  "columns": [
      {data: "idcategoria"},
      {data: "idmarca"},
      {data: "descripcion"},
      {data: "pvp"},
      {data: "impuesto"},
      {data: "id"},

  ],
  "columnDefs": [{
    "targets": 5,
    "data": "id",
    "className": "text-center",
    "render": function (data, type, row, meta) {
        return '<a href="javascript:openEditCategoriaModal(' + data + ')">'
                + '<i class="fa fa-list-alt fa-2x" alt="Editar Producto" aria-hidden="true"></i></a>  '
                + '<a href="javascript:dialogrem(' + data + ')">'
                + '<i class="fa fa-times fa-2x" style="color: red;" alt="Eliminar Producto" aria-hidden="true"></i></a>  '
                
        ;
    }
}]
 

});

}


function ajaxLoadContentPanel(Url, Titulo) {
  $.ajax({
      url: Url,
  }).done(function (data) {
      $("#MainPageContentTitle").html(Titulo);
      $("#MainPageContent").html(data);
  });
}


function ajaxLoadCountItemsCar(Url, campo) {
  $.ajax({
      url: Url,
  }).done(function (data) {
    data = JSON.parse(data);
     $("#countitems").html(data['cantidad']);
     $("#totalitems").html(data['total_precio']);
     ajaxLoadItemsCar('carrito/vista_listaitems');
  });
}

function ajaxLoadItemsCar(Url) {
  $.ajax({
      url: Url,
  }).done(function (data) {
     $("#listaitemscart").html(data);
  });
}


function addItemToCart(ID) {
  $.ajax({
      url: 'carrito/add/' + ID,
  }).done(function (data) {
    if(data.error) 
      showErrorModalMsg("Error al Registrar producto", data.error);
    else{
      ajaxLoadCountItemsCar('carrito/countitems');
      showSuccessModalMsg('Se agregó correctamente', data.message);
    }

  }).fail(function (jqXHR, textStatus, errorThrown) {

    showErrorModalMsg("Error al Registrar producto",jqXHR.responseJSON.error);
})
}



