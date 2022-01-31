
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1><small>Tramitar </small>Correspondências</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item active"><small>Tramitar </small>Correspondências</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <div class="card">
            <div class="card-header">
                 <li class="active" id="tabDetalhes" style="list-style: none;" ><a href="#tab1" data-toggle="tab"><strong>Tramitar Correspondência</strong></a></li> 
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                 <form action="" method="post" id="frm_submit">
    <div class="col-md-12">
                
<div class="span6" style="padding: 1%; margin-left:0; margin-right: 0">
                                   <h3 style="color: red; font-weight:bold;"><?php echo $result->numCorrespondencia ?></h3>                                                                         
                                    </div>
                             
<!-- Text input-->
<table style="width: 100%" class="table">
 <thead><tr><th>No.</th><th>Direcao</th><th>Departamentos</th><th>Reparticao</th></tr></thead>

<tbody id="table-details"><tr id="row1" class="jdr1">
<td><span class="btn btn-sm btn-default">1</span>
<input  type="hidden" name="count[]" value="6437" ></td>
<input  type="hidden" name="correspondencias_id[]" value="<?php echo $result->id; ?>">
<input  type="hidden" name="correspondencias_id" value="<?php echo $result->id; ?>">
<input  type="hidden" name="usuarios[]" value="<?php  echo $this->session->userdata('id'); ?>"  />

 
<td>
<select required name="direcoes[]" id="direcoes">
                     <option disabled selected >Selecione Direção</option>
                <?php foreach ($direcoes as $dir) {
                                              
            echo '<option value="'.$dir->id.'">'.$dir->abreviatura.'</option>'; } ?></select>
</td>

<td>
    <select name="departamentos[]" id="departamentos" disabled="">
                            <option value="">Selecione Departamento </option>
                    </select>
</td>

<td>
    <select name="reparticoes[]" id="reparticoes" disabled="" >
                            <option value="">Selecione Reparticao</option>
                    </select>
</td>

<td>
    <textarea name="observacao[]" id="observacao"  placeholder="Observação (Não Obrigatorio)" disabled=""></textarea > 
</td>
</tbody></table>

<br>
 <button class="btn btn-warning btn-sm btn-add-more"><strong>+</strong></button>
  <button class="btn btn-sm btn-danger btn-remove-detail-row"><i class="glyphicon glyphicon-remove"><strong>x</strong></i></button>
 <input class="btn btn-success pull-right" type="submit" value="Tramitar" name="submit">
 <a href="<?php echo base_url() ?>index.php/correspondencias" class="btn"><i class="icon-arrow-left"></i></a>

</fieldset> </div>
                       
<div class="col-md-12">
<hr>
</div> </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<!--Link para swall um alert mais lindo-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>





<script>
 $(document).ready(function (){
 $("body").on('click', '.btn-add-more', function (e) {
 direcoes = $('#direcoes').val();                    

 if (direcoes==null ) {
    swal.fire("Campo Obrigatório!", "Selecione a direção para continuar.", "warning");
    
    }

else{
e.preventDefault();
var $sr = ($(".jdr1").length + 1);
var rowid = Math.random();
var $html = '<tr class="jdr1" id="' + rowid + '">' 

   +'<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>'
   + '<input type="hidden" name="correspondencias_id[]" value="<?php echo $result->id;?>"></td>' 
   + '<input type="hidden" name="usuarios[]" value="<?php  echo $this->session->userdata('id'); ?>"></td>'
   
   + '<td><select name="direcoes[]" id="direcoes' + $sr + '"><option disabled selected >Selecione Direção</option><?php foreach ($direcoes as $dir) {echo '<option  value="'.$dir->id.'">'.$dir->abreviatura.'</option>'; } ?></select></td>'

   + '<td> <select name="departamentos[]" id="departamentos' + $sr + '"><option value="">Selecione Departamento </option></select></td>'

   + '<td><select name="reparticoes[]" id="reparticoes' + $sr + '"><option value="">Selecione Reparticao</option></select></td>'

   + '<td><textarea name="observacao[]" id="observacao' + $sr + '" placeholder="Observação (Não Obrigatorio)" disabled ></textarea > <br></td>'

   + '</tr>'; 
}

  
            
$(document).on('change','#direcoes'+$sr,function() {                 
                    $("#direcoes option:selected").each(function() {  
                         direcoes = $('#direcoes'+$sr).val();                    
                        $.post("<?php echo base_url(); ?>index.php/correspondencias/dirDep", {
                            direcoes : direcoes
                        }, function(data) {                            
                            $("#observacao"+$sr).prop('disabled',false);
                            $("#reparticoes"+$sr).prop('disabled',true);
                            $("#reparticoes"+$sr).prop('value','');
                            $("#departamentos"+$sr).html(data);
                            $("#departamentos"+$sr).removeAttr("disabled");


                    
                    });
                });
            });

 $(document).on('change','#departamentos'+$sr,function() {                       
                    $("#departamentos option:selected").each(function() {  
                         departamentos = $('#departamentos'+$sr).val();                    
                        $.post("<?php echo base_url(); ?>index.php/correspondencias/depRep", {
                            departamentos : departamentos
                        }, function(data) {
                         
                            $("#reparticoes"+$sr).html(data);
                            $("#reparticoes"+$sr).removeAttr("disabled");

                        });
                    });
                });  


            $("#table-details").append($html);  });
      
        $("body").on('click', '.btn-remove-detail-row', function (e) {
            e.preventDefault();
            if($("#table-details tr:last-child").attr('id') != 'row1'){
                $("#table-details tr:last-child").remove();
            }
            
        });
        
        $("#frm_submit").on('submit', function (e) {
         
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() ?>index.php/correspondencias/tramitar',
                type: 'POST',
                data: $("#frm_submit").serialize()
            }).always(function (response){
                var r = (response.trim());
                //alert(r);
                if(r == 1){

                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Sucesso na tramitação!',
                  text: "Deseja continuar?",
                  type: 'success',
                  showCancelButton: true,
                  confirmButtonText:'<a href="<?php echo base_url() ?>index.php/correspondencias/">Não!</a>' ,
                  cancelButtonText: '<a href="<?php echo current_url(); ?>">Sim!</a>' ,
                  reverseButtons: true
                });              
                }
                else{
                    $(".alert-danger").show();
                }
            });
            });
            });

          
           
        </script>



<script type="text/javascript">

 //Combinacao de direcoes, departamentos e reparticoes.
 $(document).ready(function() {
                $("#direcoes").change(function() {
                    $("#direcoes option:selected").each(function() {  
                         direcoes = $('#direcoes').val();                    
                        $.post("<?php echo base_url(); ?>index.php/correspondencias/dirDep", {
                            direcoes : direcoes
                        }, function(data) {
                            
                            $("#observacao").prop('disabled',false);
                            $("#reparticoes").prop('disabled',true);
                            $("#reparticoes").prop('value','');
                            $("#departamentos").html(data);
                            $("#departamentos").removeAttr("disabled");


                        });
                    });
                });
            });

 $(document).ready(function() {                       
                $("#departamentos").change(function() {
                    $("#departamentos option:selected").each(function() {  
                         departamentos = $('#departamentos').val();                    
                        $.post("<?php echo base_url(); ?>index.php/correspondencias/depRep", {
                            departamentos : departamentos
                        }, function(data) {
                         
                            $("#reparticoes").html(data);
                            $("#reparticoes").removeAttr("disabled");

                        });
                    });
                });
            });                          
                 

</script>

<script type="text/javascript">
$('#frm_submit').validate({
            rules   :{ direcoes:{ required: true} }
            //message :{ direcoes:{ required:'Campo Requerido.'} }
            
           }); 
</script>
               
