
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
              <form method="get" action="<?php echo current_url(); ?>">
                <div class="row">
                  <div class="col-1">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCorrespondencia')){ ?>
                      <a href="<?php echo base_url();?>index.php/correspondencias/adicionar" class="btn btn-primary span12 "><i class="fas fa-plus-circle"></i> </a>
                      <?php } ?>
                  </div>
                  <div class="col-6">
                    <input type="text" name="pesquisa"  id="pesquisa" class="form-control" placeholder="Cod. da Correspondência ou Ref. de Recepção" value="<?php echo $this->input->get('pesquisa'); ?>">
                  </div>
                  <div class="col-2">
                    <input type="date" name="data"  id="data"  placeholder="Data de" class="form-control datepicker" value="<?php echo $this->input->get('data'); ?>">
                  </div>
                  <div class="col-2">
                    <input type="date" name="data2"  id="data2"  placeholder="Data2 de" class="form-control datepicker" value="<?php echo $this->input->get('data2'); ?>">
                  </div>
                  <div class="col-1">
                      <button class="span12 btn"> <i class="fas fa-search"></i></button>
                  </div>
                  </div>
              </form>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Correspondência</th>
                        <th>Ref. Recepção</th>
                        <th>Prioridade</th>                       
                        <th>Destinatário</th>                        
                        <th>Data Entrada</th>
                        <th>Acções</th> 
                  </tr>
                  </thead>
                  <tbody>
                <?php  

 $direcoes=$this->session->userdata('local_direcoes'); 
 $departamentos=$this->session->userdata('local_departamentos'); 
 $reparticoes=$this->session->userdata('local_reparticoes'); 
                

foreach ($results as $r) {
  if ($direcoes<>" " and $departamentos==0 and $reparticoes==0) {
  if ($r->estadoTra=='0'and $r->local_direcoes_id==$direcoes ) {
                   
                
                echo '<tr>';
                echo '<td>'.$r->numCorrespondencia.'</td>';
                echo '<td>'.$r->refRec.'</td>';
                echo '<td>'.$r->prioridades.'</td>';
                echo '<td>'.$r->destinatario.'</td>';
                echo '<td>'.$r->date.'</td>';               

                echo '<td>';
                    
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'iProtocolo')){
                        echo '<a class="btn btn-inverse tip-top" target="_blank" href="'.base_url().'index.php/correspondencias/visualizar/'.$r->id.'" class="btn tip-top" title="Protocolo"><i class="fas fa-copy"></i></a>'; 
                    }


                    if($this->permission->checkPermission($this->session->userdata('permissao'),'detCorrespondencia')){
                        echo '<a href="'.base_url().'index.php/correspondencias/visualizar_correspondencia/'.$r->id.'"  class="btn tip-top" style="margin-right: 1%" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>'; 
                    
                    }

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){
                        echo '<a href="'.base_url().'index.php/correspondencias/editar/'.$r->id.'"  class="btn tip-top" style="margin-right: 1%" title="Editar"><i class="fas fa-edit"></i></a>'; 
                    }

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'tCorrespondencia')){
                         echo '<a href="'.base_url().'index.php/correspondencias/tra_par/'.$r->id.'" style="margin-right: 1%" role="button" correspondencias_id="'.$r->id.'" correspondenciaTra="'.$r->numCorrespondencia.'" prioridadeTra="'.$r->prioridades.'" class="btn tip-top" title="Tramitar"><i class="fas fa-share-square"></i></a>';
                    }                 
                    
                echo  '</td>';
                echo '</tr>';
            } 
  }//fecha a primeira condicao

else if  ($direcoes<>" " and $departamentos<>" " and $reparticoes==0) {
if ($r->estadoTra=='0'and $r->local_direcoes_id==$direcoes and $r->local_departamentos_id==$departamentos) {
                   
                
                echo '<tr>';
                echo '<td>'.$r->numCorrespondencia.'</td>';
                echo '<td>'.$r->refRec.'</td>';
                echo '<td>'.$r->prioridades.'</td>';
                echo '<td>'.$r->tipo_pro.'</td>';
                echo '<td>'.$r->destinatario.'</td>';
                echo '<td>'.$r->date.'</td>';
  

                echo '<td>';
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'iProtocolo')){
                        echo '<a class="btn btn-inverse tip-top" style="margin-right: 1%" target="_blank" href="'.base_url().'index.php/correspondencias/visualizar/'.$r->id.'" class="btn tip-top" title="Imprimir"><i class="icon-print"></i></a>'; 
                    }

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'tCorrespondencia')){
                         echo '<a href="'.base_url().'index.php/correspondencias/tra_par/'.$r->id.'" style="margin-right: 1%" role="button" data-toggle="modal" correspondencias_id="'.$r->id.'" correspondenciaTra="'.$r->numCorrespondencia.'" prioridadeTra="'.$r->prioridades.'" class="btn btn-danger tip-top" title="Tramitar"><i class="icon-share-alt icon-white"></i></a>';
                    }

                     if($this->permission->checkPermission($this->session->userdata('permissao'),'iProtocolo')){
                        echo '<a class="btn btn-info tip-top" style="margin-right: 1%" target="_blank" href="'.$r->url.'"  class="btn btn-info tip-top"   title="Baixar"><i class="icon-download icon-white"></i></a>'; 
                    }
                   
                echo  '</td>';
                echo '</tr>';
            } 
  }//fecha a segunda condicao

else if  ($direcoes<>" " and $departamentos<>" " and $reparticoes<>" ") {
  if ($r->estadoTra=='0'and $r->local_direcoes_id==$direcoes and $r->local_departamentos_id==$departamentos and $r->local_reparticoes_id==$reparticoes) {
                   
                
                echo '<tr>';
                echo '<td>'.$r->numCorrespondencia.'</td>';
                echo '<td>'.$r->refRec.'</td>';
                echo '<td>'.$r->prioridades.'</td>';
                echo '<td>'.$r->tipo_pro.'</td>';
                echo '<td>'.$r->destinatario.'</td>';
                echo '<td>'.$r->date.'</td>';
               
               

                echo '<td>';
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'iProtocolo')){
                        echo '<a class="btn btn-inverse tip-top" style="margin-right: 1%" target="_blank" href="'.base_url().'index.php/correspondencias/visualizar/'.$r->id.'" class="btn tip-top" title="Imprimir"><i class="icon-print"></i></a>'; 
                    }

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'tCorrespondencia')){
                         echo '<a href="'.base_url().'index.php/correspondencias/tra_par/'.$r->id.'" style="margin-right: 1%" role="button" data-toggle="modal" correspondencias_id="'.$r->id.'" correspondenciaTra="'.$r->numCorrespondencia.'" prioridadeTra="'.$r->prioridades.'" class="btn btn-danger tip-top" title="Tramitar"><i class="icon-share-alt icon-white"></i></a>';
                    }

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'iProtocolo')){
                        echo '<a class="btn btn-info tip-top" style="margin-right: 1%" target="_blank" href="'.$r->url.'"  class="btn btn-info tip-top"   title="Baixar"><i class="icon-download icon-white"></i></a>'; 
                    }

                   
                echo  '</td>';
                echo '</tr>';
           
  }//fecha a terceira condicao

 }//fecha o ciclo
 }
            ?>
      

                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Correspondência</th>
                        <th>Ref. Recepção</th>
                        <th>Prioridade</th>
                        <th>Proveniencia</th>                        
                     
                        <th>Data Entrada</th>
                        <th>Acções</th> 
                      
                  </tr>
                  </tfoot>
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
