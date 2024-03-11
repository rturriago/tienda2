
function ajaxInscribir() {
      
      $("#hCedula").val($("#regCedula").val());

      $.ajax({
          url: 'index.php/usuario/new_user',
          type: "POST",
          data: {
            regNombres: $("#regNombres").val(),
            regEdad: $("#regEdad").val(),
            regSexo: $("#regSexo").val(),
            regCedula: $("#regCedula").val(),
            regTipoID: $("#regTipoID").val(),
            regTelef: $("#regTelef").val(),
            regEmail: $("#regEmail").val(),
            regCiudad: $("#regCiudad").val(),
            regInstitucion: $("#regInstitucion").val(),
            regEspecialidad: $("#regEspecialidad").val(),
            regProfesion: $("#regProfesion").val(),
            regPassword: $("#regPassword2").val(),
            regSimposio: $("#regSimposio").val(),
            regTipoIns: $("#regTipoInsc").val()
          }
        }).done(function(data) {
          if(data==""){
              if($("#regTipoInsc").val()=="E")
              {
                    window.location.href = "index.php/ponente/index";
              }else{
                 showMessage("Inscripciones CIDU 2022", "<strong>Su inscripción quedó registrada correctamente</strong>");  
                 $('#modalNewReg').modal('hide'); 
              }
            
          }else{
              showMessage("Inscripciones CIDU 2022", data);  
          }


          

        }).fail(function(data) {
          console.log("Err: ajaxRegistrarParticipante");
          console.log(data);
          document.write(data.responseText);
        }).always(function(data) {
          // $("#MainPageContent").html(data);
        });
}


function ajaxInscribirCoord(urlbase) {
      
      $("#hCedula").val($("#regCedula").val());

      $.ajax({
          url:  urlbase+ 'index.php/usuario/new_usercoord',
          type: "POST",
          data: {
            regNombres: $("#regNombres").val(),
            regEdad: $("#regEdad").val(),
            regSexo: $("#regSexo").val(),
            regCedula: $("#regCedula").val(),
            regTipoID: $("#regTipoID").val(),
            regTelef: $("#regTelef").val(),
            regEmail: $("#regEmail").val(),
            regCiudad: $("#regCiudadC").val(),
            regInstitucion: $("#regInstitucion").val(),
            regEspecialidad: $("#regEspecialidad").val(),
            regProfesion: $("#regProfesion").val(),
            regPassword: $("#regPassword2").val(),
            regSimposio: $("#regSimposio").val(),
            regSimposioNombre: $("#regSimposioNombre").val(),
            regTipoIns: $("#regTipoInsc").val()
          }
        }).done(function(data) {
          if(data==""){
                 showMessage("Inscripciones CIDU 2022", "<strong>Participante registrado correctamente</strong>");  
          }else{
              showMessage("Inscripciones CIDU 2022", data);  
          }

        }).fail(function(data) {
          console.log("Err: ajaxInscribirCoord");
          console.log(data);
          document.write(data.responseText);
        }).always(function(data) {
          // $("#MainPageContent").html(data);
        });
}

    
function ajaxInscribirMagCoord(urlbase) {
      
  $.ajax({
      url:  urlbase+ 'index.php/usuario/new_usermag',
      type: "POST",
      data: {
        regNombres: $("#regNombres").val(),
        regTitulo: $("#regTitulo").val(),
        regSexo: $("#regSexo").val(),
        regEmail: $("#regEmail").val(),
        regPais: $("#regPaisC").val(),
        regInstitucion: $("#regInstitucion").val(),
        regEspecialidad: $("#regEspecialidad").val(),
        regProfesion: $("#regProfesion").val(),
        regSimposio: $("#regSimposio").val(),
        regSimposioNombre: $("#regSimposioNombre").val(),
      }
    }).done(function(data) {
      if(data==""){
          alert("Conferencista Magistral registrado correctamente");  
          callListaMagCoord(urlbase,$("#regSimposioNombre").val());
      }else{
          showMessage("Inscripciones CIDU 2022", data);  
      }

    }).fail(function(data) {
      console.log("Err: ajaxInscribirMagCoord");
      console.log(data);
      document.write(data.responseText);
    }).always(function(data) {
      // $("#MainPageContent").html(data);
    });
}

function ajaxUpdateMagCoord(urlbase) {
      
  $.ajax({
      url:  urlbase+ 'index.php/usuario/edit_mag',
      type: "POST",
      data: {
        regNombres: $("#regNombres").val(),
        regTitulo: $("#regTitulo").val(),
        regSexo: $("#regSexo").val(),
        regEmail: $("#regEmail").val(),
        regPais: $("#regPaisC").val(),
        regInstitucion: $("#regInstitucion").val(),
        regEspecialidad: $("#regEspecialidad").val(),
        regProfesion: $("#regProfesion").val(),
        regSimposio: $("#regSimposio").val(),
        regSimposioNombre: $("#regSimposioNombre").val(),
        idmagistral: $("#idm").val(),
      }
    }).done(function(data) {
      if(data==""){
          alert("Conferencista Magistral actualizado correctamente");  
          callListaMagCoord(urlbase,$("#regSimposioNombre").val());
      }else{
          showMessage("Inscripciones CIDU 2022", data);  
      }

    }).fail(function(data) {
      console.log("Err: ajaxInscribirMagCoord");
      console.log(data);
      document.write(data.responseText);
    }).always(function(data) {
      // $("#MainPageContent").html(data);
    });
}

function ajaxEditarCoord(urlbase) {
      
      $.ajax({
          url:  urlbase+ 'index.php/usuario/edituser',
          type: "POST",
          data: {
            regNombres: $("#regNombres").val(),
            regSexo: $("#regSexo").val(),
            regTelef: $("#regTelef").val(),
            regCedula: $("#regCedula").val(),
            regInstitucion: $("#regInstitucion").val(),
            regEspecialidad: $("#regEspecialidad").val(),
            regProfesion: $("#regProfesion").val(),
            regPassword: $("#regPassword2").val(),
            regSimposio: $("#regSimposio").val(),
            idUsuario: $("#regidUsuario").val()
          }
        }).done(function(data) {
          if(data==""){
              $("#nameusr").html($("#regNombres").val().toUpperCase());
              showMessage("Inscripciones CIDU 2022", "<strong>Cambios  registrados correctamente</strong>");  
          }else{
              showMessage("Inscripciones CIDU 2022", data);  
          }

        }).fail(function(data) {
          console.log("Err: ajaxEditarCoord");
          console.log(data);
          document.write(data.responseText);
        }).always(function(data) {
          // $("#MainPageContent").html(data);
        });
}

function ajaxEditarPonencia(urlbase, tipoponencia) {
      var formData = new FormData($('#frmMainRegPon')[0]);
      formData.append("idponencia", $("#idponencia").val());
      formData.append("pfile", $("#pfile").val());
      formData.append("tipo_pon", tipoponencia);
      formData.append("regKeys", parseKeywords($("#regkeys").val()));
      formData.append("regTitulo",  CKEDITOR.instances.regTitulo.getData().trim());
      formData.append("resIntro",  CKEDITOR.instances.resIntro.getData().trim());
      formData.append("resObjetivo",  CKEDITOR.instances.resObjetivo.getData().trim());
      formData.append("resMetodologia",  CKEDITOR.instances.resMetodologia.getData().trim());
      formData.append("resResultados",  CKEDITOR.instances.resResultados.getData().trim());
      formData.append("resConclusiones",  CKEDITOR.instances.resConclusiones.getData().trim());

      $.ajax({
          url:  urlbase+ 'index.php/usuario/editponencia',
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          async: false
        }).done(function(data) {
          if(data==""){
              alert("Cambios  registrados correctamente");  
              callListaPonenciasPonente(urlbase);
          }else{
              showMessage("CIDU 2022", data);  
          }

        }).fail(function(data) {
          console.log("Err: ajaxEditarPonencia");
          console.log(data);
        }).always(function(data) {
          // $("#MainPageContent").html(data);
        });
}

function ajaxEditarAutoresPonencia(urlbase) {
      $.ajax({
          url:  urlbase+ 'index.php/usuario/editautoresponencia',
          type: "POST",
          data: {
            autor1: $("#txtautor1").val(),
            autor2: $("#txtautor2").val(),
            autor3: $("#txtautor3").val(),
            autor4: $("#txtautor4").val(),
            idp: $("#idponencia").val()
          }
        }).done(function(data) {
          if(data==""){
              $("#msgalerta").fadeTo(2000, 500).slideUp(500, function() {
                $("#msgalerta").slideUp(500);
              });
          }else{
              $("#msgalerta2").fadeTo(2000, 500).slideUp(500, function() {
                $("#msgalerta2").slideUp(500);
              });
          }

        }).fail(function(data) {
          console.log("Err: ajaxEditarAutoresPonencia");
          console.log(data);
          document.write(data.responseText);
        }).always(function(data) {
          // $("#MainPageContent").html(data);
        });
}


function uploadImgPoster(base_url, idponencia, idimg ) {
    
  var input = document.getElementById('regFile' + idimg);
  var formData = new FormData();
  formData.append("img", input.files[0]);
  formData.append("idponencia", idponencia);
  formData.append("idimg", idimg);

  $.ajax({
      url:  base_url + 'index.php/poster/uploadimgposter',
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      async: false
    }).done(function(data) {
      if(data==""){
        bs4Toast.primary('Diseñador de Poster', 'Imagen registrada correctamente'); 
      }else
        bs4Toast.error('Diseñador de Poster', data);
    });
}



function ajaxRegistrarPonencia(tipoponencia, base_url) {
    
    var input = document.getElementById('regFile');
    var files = input.files;
    var formData = new FormData($('#frmMainRegPon')[0]);
    formData.append("idusuario", $("#idusuario").val());
    formData.append("tipo_pon", tipoponencia);
    formData.append("coautores", getListaCouA());
    formData.append("regKeys", parseKeywords($("#regkeys").val()));
    formData.append("regTitulo",  CKEDITOR.instances.regTitulo.getData().trim());
    formData.append("resIntro",  CKEDITOR.instances.resIntro.getData().trim());
    formData.append("resObjetivo",  CKEDITOR.instances.resObjetivo.getData().trim());
    formData.append("resMetodologia",  CKEDITOR.instances.resMetodologia.getData().trim());
    formData.append("resResultados",  CKEDITOR.instances.resResultados.getData().trim());
    formData.append("resConclusiones",  CKEDITOR.instances.resConclusiones.getData().trim());



  $.ajax({
      url:  base_url + 'index.php/usuario/reg_ponencia',
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      async: false
    }).done(function(data) {
        if (data == "") {
            alert("Ponencia Registrada Correctamente. Muchas gracias por participar en el CIDU 2022.");
            callListaPonenciasPonente(base_url);
        } else {
           showErrorModalMsg('Error al registrar Ponencia', data) ;
        }

    }).fail(function (data) {
                console.log("Err: ajaxRegistrarParticipante");
                console.log(data);
                document.write(data.responseText);
    }).always(function (data) {
              // $("#MainPageContent").html(data);
    });
}


function savePosterVideo(urlbase, idp) {
      
  $.ajax({
      url:  urlbase+ 'index.php/poster/updatepostercontent',
      type: "POST",
      data: {
        content: $("#txtvideo").val(),
        campo: "video",
        idp: idp
      }
    }).done(function(data) {
      if(data==""){
         bs4Toast.primary('Diseñador de Poster', 'Video registrado correctamente');
      }else{
          bs4Toast.error('Diseñador de Poster', "Error al registrar video: " + data);
      }

    });
}

function savePosterContent(urlbase, idp) {
      
  $.ajax({
      url:  urlbase+ 'index.php/poster/updatepostercontent',
      type: "POST",
      data: {
        content: $("#tbPoster").html(),
        campo: "content",
        idp: idp
      }
    }).done(function(data) {
      if(data==""){
          bs4Toast.primary('Diseñador de Poster', 'Cambios  registrados correctamente.');
      }else{
          bs4Toast.error('Diseñador de Poster', "Error al editar diseño: " + data);
      }

    });
}



