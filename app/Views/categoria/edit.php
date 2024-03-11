          <!-- Begin form -->
          <form id="frmMainUpdC" name="frmMainUpdC" data-aos="fade-in">

          <input type="hidden" name="idc" id="idc" value="<?= $id; ?>">
          
            <div class="card" style="margin: 0.5em 0.5em 0.5em 0.5em;">
             
           
            <div class="tr-card-body">
            <div class="row mb-2">
                <div class="col-sm-11" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                    <label for="regNombres">Descripción</label>
                    <input 
                      id="regDescripcion" 
                      name="regDescripcion" 
                      type="text" 
                      class="form-control" 
                      maxlength="100"
                      placeholder="Descripción"
                      value="<?= $descripcion; ?>"
                      required>
                    <div class="valid-feedback">Descripción válida</div>
                    <div class="invalid-feedback">Escriba una Descripción de la Categoría</div>
                </div>
              </div>  <!-- row -->
            </div><!-- bodycard -->
           </div><!-- card -->

           <div class="alert alert-danger" id="error-alert" role="alert">
            <div id="msgalert"></div>
        </div>

        </form> <!-- Fin de primer formulario () -->


</body>

<script type="text/javascript">
     
     $("#error-alert").hide();
  
            
</script>

</html>