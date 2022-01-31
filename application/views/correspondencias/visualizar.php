
<div class="wrapper">
  <!-- Navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><small>Correspondências </small>Ostensivas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item active"><small>Correspondências </small>Ostensivas</li>
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
              <div class="buttons">
                    <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="fas fa-print icon-white"></i> Imprimir</a>
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
               <table class="table" id="printCorrespondencia">
                            <tbody>

                                <?php if($emitente == null) {?>
                                            
                                <tr >
                                    <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/sigdoc/emitente">Configurar</a><<<</td>
                                </tr>
                                <?php } else {?>

                     <tr>
               
                        <td >
                        <img style="width: 100%;" src=" <?php echo $emitente[0]->url_logo; ?> "><br>

                                
                    
                                <td style="width: 45%; font-size: 16px; color: black;text-align: center; padding-top: 100px;">
                                <span style="font-weight:bold;">Referência de Recepção: </span><span ><?php echo $result->refRec?></span></br></br>

                                <span style="font-weight:bold;">Proviniência: </span><span ><?php echo $result->tipo_pro?></span></br></br>

                                <span style="font-weight:bold;">Data Recepção:: </span><span ><?php echo $result->data_normal?></span></br></br>

                                </td>


                                 <td style="width: 30%; text-align: center; font-style: bold; color: black; font-size: 16px; center; padding-top: 100px;">
                                <span style="font-weight:bold;">Número Correspondência: </span><br><span ><?php echo $result->numCorrespondencia?></span></br></br></br>

                                <span style="font-weight:bold;">Emissão: </span><span ><?php echo date('d/m/Y');?></span></br>

                                </td>

                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>

<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").click(function(){         
            PrintElem('#printCorrespondencia');
        })

        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data)
        {
            var mywindow = window.open('', 'mydiv', 'height=600,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange=function(){
             if(this.readyState==='complete'){
              this.onreadystatechange=function(){};
              mywindow.focus();
              mywindow.print();
              mywindow.close();
             }
            }


            mywindow.document.write('<html><head><title>Sistema de Gestão de Documentos</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");


            mywindow.document.write("</head><body >");
            mywindow.document.write(data);          
            mywindow.document.write("</body></html>");

            mywindow.document.close(); // necessary for IE >= 10


            return true;
        }


    });
</script>

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


