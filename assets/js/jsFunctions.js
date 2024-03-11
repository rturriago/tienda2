function showErrorModalMsg(Titulo, Mensaje) {
    $('#modalSmsTitle').text(Titulo,);
    $('#modalSmsBody').html('<i class="fa fa-exclamation-circle fa-2x" style="color:red" aria-hidden="true"></i> <b>' + Mensaje + '</b>');
    $('#modalSms').modal('show');
  }

function showSuccessModalMsg(Titulo, Mensaje) {
    $('#modalSuccessTitle').text(Titulo,);
    $('#modalSuccessBody').html('<i class="fa fa-info-circle fa-2x" style="color:blue" aria-hidden="true"></i> <b>' + Mensaje + '</b>');
    $('#modalSuccess').modal('show');
  }
  
function dialogrem(ID) {
    $('#idRegistro').val(ID);
    $("#delete-alert").hide();
    $('#remModal').modal('show');
}

function fillCombo(Url, divID, idItemSelected, addItemAll=false) {
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

function isValidUrl(url)
{
    var pattern = /^(http|https)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
    return url.match(pattern);
}

function showPreview(event, idIMG)
    {
        if(event.target.files.length > 0){

            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById(idIMG );
            preview.src = src;
        }
    }

    function ajaxLoadContentPanel(Url, Titulo) {
        $.ajax({
            url: Url,
        }).done(function (data) {
            $("#MainPageContentTitle").html(Titulo);
            $("#MainPageContent").html(data);
        });
    }


    