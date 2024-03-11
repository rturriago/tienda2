
function fxValidaFrm() {

  if($("#regDescripcion").val().trim()=="") return "Ingrese Descripción del Producto";
  if($("#regDescripcion").val().trim().length < 3) return "La Descripción del Producto debe tener mínimo 3 caracteres";

  if($("#txtImpuesto").val().trim()=="") return "Ingrese Valor del Impuesto del Producto";
  
  var valor = $("#txtImpuesto").val().trim();
  if (isNaN(valor))  return "Ingrese Impuesto Válido"
  
  if(valor <0 ) return "Ingrese Valor del Impuesto del Producto mayor a 0";
  if(valor > 12 ) return "Ingrese Valor del Impuesto del Producto menor a 10";

   
  return "";
}


function showErrorModalMsg(Titulo, Mensaje) {
  $('#modalSmsTitle').text(Titulo,);
  $('#modalSmsBody').html('<i class="fa fa-exclamation-circle" style="color:red" aria-hidden="true"></i> <b>' + Mensaje + '</b>');
  $('#modalSms').modal('show');
}

function showSuccessModalMsg(Titulo, Mensaje) {
  $('#modalSmsTitle').text(Titulo,);
  $('#modalSmsBody').html('<i class="fa fa-info-circle" style="color:blue" aria-hidden="true"></i> <b>' + Mensaje + '</b>');
  $('#modalSms').modal('show');
}


function fxSaveProducto() {
  var datos =  JSON.stringify({
    idcategoria: $("#regCategoria").val(), 
    idmarca:     $("#regMarca").val(),
    descripcion: $("#regDescripcion").val(),
    precio:      $("#txtPrecio").val(),
    pvp:         $("#txtPVP").val(),
    impuesto:    $("#txtImpuesto").val()

  });
  console.log(datos);

  $.ajax({
    url: 'http://localhost/tienda/producto/add', 
    type: 'POST', 
    contentType: 'application/json', 
    data: datos,
    success: function(response) {
      //alert(response.message);
      //window.location.href = 'listaproducto.html';
      if(response.message) 
        showSuccessModalMsg("Registro de Producto",response.message);
      else
       showSuccessModalMsg("Registro de Producto","Producto creado correctamente");
     
    },
    error: function(xhr, status, error) {
      var detalle_error="";
      if(xhr.responseJSON && xhr.responseJSON.validaciones) {
        xhr.responseJSON.validaciones.forEach(function(validacion) {
          detalle_error = detalle_error + validacion.campo + ": " + validacion.mensaje +"<br/>";
        });
      } else {
        detalle_error ="Error en la solicitud " + error;
      }

      showErrorModalMsg("Error en Registro de Producto",detalle_error);
    }
  });
}



