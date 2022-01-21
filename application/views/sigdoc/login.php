<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/style.css">
    
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/login/images/misau.png">

     <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">

  <script src="<?php echo base_url();?>assets/login/js/jquery-1.10.2.min.js"></script>

  <title>Login - Sistema de Gestão de Documentos</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo base_url()?>assets/login/images/undraw_remotely_2j6y.svg" alt="Secretaria" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <img src="<?php echo base_url()?>assets/login/images/logo.png" alt="Login" class="img-fluid">
            </div>

            <form action="<?php echo base_url()?>index.php/sigdoc/verificarLogin" method="post" id="formLogin">

            <?php if($this->session->flashdata('error') != null){?>
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $this->session->flashdata('error');?>
                       </div>
                  <?php }?>

              <div class="form-group first" >
              <!--   <label for="username">E-mail</label> -->
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" style="font-size: 14px">
              </div>

              <div class="form-group last mb-4">
                <!-- <label for="password">Senha</label> -->
                <input type="password" class="form-control" name="senha" type="password" placeholder="Senha" style="font-size: 14px">
              </div>

             <button id="btn-acessar" class="btn btn-block btn-primary"/> Autenticar</button>  

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
        <footer style="padding-left: 20px; text-align: center; color: blue">
            <p class="mb-4">© <?php echo date("Y"); ?> Ministério da Saúde (MISAU) - O nosso maior valor é a vida | Todos Direitos Reservados | Implementação: DTIC  </p> 
          </footer>
    

<script src="<?php echo base_url()?>assets/login/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/login/js/validate.js"></script>

 <script type="text/javascript">
            $(document).ready(function(){

                $('#email').focus();
                $("#formLogin").validate({
                     rules :{
                          email: { required: true, email: true},
                          senha: { required: true}
                    },
                    messages:{
                          email: { required: 'Campo Requerido.', email: 'Insira Email válido'},
                          senha: {required: 'Campo Requerido.'}
                    },
                   submitHandler: function( form ){       
                         var dados = $( form ).serialize();
                         $('#btn-acessar').addClass('disabled');
                         $('#progress-acessar').removeClass('hide');
                    
                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url();?>index.php/sigdoc/verificarLogin?ajax=true",
                          data: dados,
                          dataType: 'json',
                          success: function(data)
                          {
                            if(data.result == true){
                                window.location.href = "<?php echo base_url();?>index.php/sigdoc";
                            }
                            else{


                                $('#btn-acessar').removeClass('disabled');
                                $('#progress-acessar').addClass('hide');
                                
                                $('#call-modal').trigger('click');
                            }
                          }
                          });

                          return false;
                    },

                    errorClass: "help-inline",
                    errorElement: "span",
                    highlight:function(element, errorClass, validClass) {
                        $(element).parents('.control-group').addClass('error');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).parents('.control-group').removeClass('error');
                        $(element).parents('.control-group').addClass('success');
                    }
                });

            });

        </script>

  <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">Notificação</a>

         <div  class="modal fade" id="notification">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header btn-primary">
              <h4 class="modal-title" style="padding-left:30px">  Sistema de Gestão de Documentos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p style="color: white; font-size: 14px; font-weight: bold;"><i class="fa fa-exclamation-triangle" ></i>  Os dados de acesso estão incorretos, por favor tente novamente!&hellip;</p>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</body>
</html>

