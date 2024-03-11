                    <form id="frmMainRegProducto" name="frmMainRegProducto" data-aos="fade-in"  method="post" enctype="multipart/form-data">
                        
                        <div class="card">
                        
                            <div class="card-header h6">DATOS DEL PRODUCTO</div>
                            
                            
                                
                                <div class="row mb-2" style="margin: 0.5em 0.5em 0.5em 0.5em;">

                                    <div class="col-sm-4" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                      <label for="regCategoria"><i class="fas fa-tablet-alt"></i> Categorías</label>
                                        <select id="regCategoria" name="regCategoria" class="custom-select" required>
                                        </select>
                                        <div class="valid-feedback">Categoría válida</div>
                                        <div class="invalid-feedback">Categoría NO válida</div>
                                    </div>
                                    
                                    <div class="col-sm-7" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                        <label for="regMarca"><i class="fas fa-trademark"></i> Marcas</label>
                                          <select id="regMarca" name="regMarca" class="custom-select" required>
                                            
                                          </select>
                                        
                                        <div class="invalid-feedback">Seleccione una Marca</div>
                                    </div>
                                </div>

                                <div class="row mb-2" style="margin: 0.5em 0.5em 0.5em 0.5em;">

                                <div class="col-sm-11" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                    <label for="regDescripcion"><i class="fas fa-star"></i> Descripción </label>
                                    <input 
                                      id="regDescripcion" 
                                      name="regDescripcion" 
                                      type="text" 
                                      class="form-control" 
                                      style="text-transform:uppercase"
                                      maxlength="100"
                                      minlength="3"
                                      placeholder="Descripción del producto"
                                      required>
                                    <div class="valid-feedback">Descripción válido</div>
                                    <div class="invalid-feedback">Escriba la Descripción del Producto</div>
                                </div>
                                </div>
                          
                                
                                <div class="row mb-2" style="margin: 0.5em 0.5em 0.5em 0.5em;">

                                    <div class="col-sm-4" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                        <label for="txtPrecio">Precio Costo</label>
                                        <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" step="0.01" value="0.00">
                                        <small class="form-text text-muted">Introduce un número con hasta dos decimales.</small>
                    
                                        <div class="invalid-feedback">Precio Costo NO válido</div>
                                        <div class="valid-feedback">Precio Costo válido</div>
                                    </div>
                                    
                                    <div class="col-sm-4" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                        <label for="txtPVP">PVP</label>
                                        <input type="number" class="form-control" id="txtPVP" name="txtPVP" step="0.01" value="0.00" required>
                                        <small class="form-text text-muted">Introduce un número con hasta dos decimales.</small>
                                       
                                        <div class="invalid-feedback">PVP NO válido</div>
                                        <div class="valid-feedback">PVP correcto</div>
                                    </div>

                                    <div class="col-sm-3" style="margin: 0.5em 0.5em 0.5em 0.5em;">
                                        <label for="txtImpuesto">% Impuesto</label>
                                        <input type="number" class="form-control" id="txtImpuesto" name="txtImpuesto" step="0.01" value="0.00" max="12">
                                        <small class="form-text text-muted">Introduce un número con hasta dos decimales.</small>
                                        
                                        <div class="invalid-feedback">Impuesto NO válido</div>
                                    </div>
                                </div>
                           
                        
                        </div>
                            
                        
                            <div class="card-footer">
                                <div class="col-6" style="text-align: right;">
                                    <a id="regSubmit" class="btn btn-primary">Registrar</a>
                                </div>
                            </div>
                        
                      
                </form> 

               

    <script type="text/javascript">

        fillLista('categoria/getlistadoCB','regCategoria',-1,true);
        fillLista('marca/getlistadoCB','regMarca',-1,true);

        $("#regSubmit").click(function (e) {
            $("#frmMainRegProducto").addClass("was-validated");

            var resp=fxValidaFrm();
            if(resp==""){

                fxSaveProducto();
                
            }else showErrorModalMsg('Error al registrar Producto', resp) ;


        });
    
            
    
    </script>
