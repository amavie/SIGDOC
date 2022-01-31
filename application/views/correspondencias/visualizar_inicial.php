
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><small>Detalhes </small>da Correspondências</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/correspondencias">Correspondência</a></li>
              <li class="breadcrumb-item active"><small>Detalhes</small>da Correspondências</li>
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
  
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tbody>
                        <td rowspan="6" style="text-align: center;">
                            <?php if (!empty($result->url)) {?>
                              <iframe src="<?php echo $result->url ?>" width="500" height="400" style="border: none;"></iframe>
                              <?php } ?> 

                             <?php if (empty($result->url)) {?>
                              <iframe  width="0" height="20" style="border: none;">
                                </iframe>
                                <span class="icon" style="font-size: 80px"><i class="icon-file"></i></span><h5>SEM ANEXO</h5>
                              <?php } ?> 
                              <tr>
                                <td style="text-align: right;"><strong>Correspondência</strong></td>
                                <td><?php echo $result->numCorrespondencia ?></td>
                              </tr>
                              
                              <tr>
                              <td style="text-align: right"><strong>Proviniência</strong></td>
                              <td><?php echo $result->tipo_pro ?></td>
                               </tr>
                               
                               <tr>
                               <td style="text-align: right"><strong>Ref. Recepção</strong></td>
                                <td><?php echo $result->refRec ?></td>
                                </tr>
                                                 

                                <tr>
                                 <td style="text-align: right"><strong>Assunto</strong></td>
                                 <td><?php echo $result->assunto ?></td>
                                 </tr>
                                              
                                 <tr>
                                  <td style="text-align: right"><strong>Data Entrada</strong></td>
                                  <td><?php echo $result->date ?></td>
                                  </tr>
                                            
                                                </td>
                                            </tbody>
                                        </table>
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
