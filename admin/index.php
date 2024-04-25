<?php 
require_once("inc/config.php");

$titulo     = '';
$texto      = '';
$txtData    = '';
$imagem     = '';
$spanAtivo  = ''; 

$query = "SELECT * FROM principal WHERE txtTitulo = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query))
      exit('SQL error');

$txtPesq = 'NAÇÃO CABINDA';

mysqli_stmt_bind_param($stmt, 'i', $txtPesq);
mysqli_stmt_execute($stmt);
$res = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if($res){
    $titulo               = utf8_encode($res["txtTitulo"]);
    $texto                = utf8_encode(substr($res["txtTexto"], 0, 80)) . ' ...';
    $imagem               = $res["txtImagem"];
    $dataHoraCadastro     = $res["dataHoraCadastro"];
    $dataHoraAtualizacao  = $res["dataHoraAtualizacao"];

    if ( ($dataHoraCadastro < $dataHoraAtualizacao) || ($dataHoraCadastro == $dataHoraAtualizacao) ) {
      $txtData = 'Editado em ' . DataParaISO($dataHoraAtualizacao, '-');
    } else {
      $txtData = 'Criado em ' . DataParaISO($dataHoraCadastro, '-');
    }

    $ativo                = $res["ativo"];

    switch ($ativo) {
      case '1':
        $spanAtivo = "<span class='badge badge-success'>Ativo</span>";
        break;
      
      default:
        $spanAtivo = "<span class='badge badge-danger'>Inativo</span>";
        break;
    }

  
}

#### BUSCA EVENTOS ####

$qryEvento = "SELECT * FROM evento";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $qryEvento))
      exit('SQL error');

mysqli_stmt_execute($stmt);

$resEvento = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if($resEvento){
  $idEvento           = $resEvento["idEvento"];
  $tituloEvento       = $resEvento["txtTitulo"];
  $txtEndereco        = $resEvento["txtEndereco"];
  $dataHoraEvento     = $resEvento["dataHora"];
  $dataHoraCadastroEv = $resEvento["dataHoraCadastro"];
  $ativoHomenagem     = $resEvento["ativo"];

  if ( ($dataHoraEvento < $dataHoraCadastroEv) || ($dataHoraEvento == $dataHoraCadastroEv) ) {
    $dataHoraEvento = 'Editado em ' . DataParaISO($dataHoraCadastroEv, '-');
  } else {
    $dataHoraEvento = DataParaISO($dataHoraEvento, '-');
  }

  switch ($ativoHomenagem) {
    case '1':
      $spanAtivoHomenagem = "checked";
      break;
    
    default:
      $spanAtivoHomenagem = "";
      break;
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Centro Africano Oxalá e Iemanjá</title>

  <link rel="shortcut icon" href="../img/favicon_io/favicon-32x32.png" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <!--li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php require_once('src/pages/partials/sidebar-menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Textos da Página Inicial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Textos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Escolha uma aba ao lado</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Textos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Evento</a></li>
                  <!--li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li-->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <!-- Default box -->
                    <div class="card">
                      <!--div class="card-header">
                        <h3 class="card-title">Textos da Página Inicial</h3>
                        <div class="card-tools">
                          <a class="btn btn-success btn-sm" href="#">
                            <i class="fas fa-plus"></i>Incluir
                          </a>
                        </div>
                      </div-->
                      <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Título
                                    </th>
                                    <th style="width: 30%">
                                        Texto
                                    </th>
                                    <th>
                                        Imagem
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            <?=$titulo?>
                                        </a>
                                        <br/>
                                        <small>
                                            <?=$txtData?>
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <?=$texto?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <?=$imagem?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-state">
                                        <?=$spanAtivo?>
                                    </td>
                                    <td class="project-actions text-right">
                                        <!--a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a-->
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <!--a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Excluir
                                        </a-->
                                    </td>
                                </tr>                  
                                
                            </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <!-- Default box -->
                    <div class="card">
                      <!--div class="card-header">
                        <h3 class="card-title">Textos da Página Inicial</h3>
                        <div class="card-tools">
                          <a class="btn btn-success btn-sm" href="#">
                            <i class="fas fa-plus"></i>Incluir
                          </a>
                        </div>
                      </div-->
                      <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Título
                                    </th>
                                    <th>
                                        Data/Hora
                                    </th>
                                    <th style="width: 30%">
                                        Endereço
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            <?=$tituloEvento?>
                                        </a>
                                    </td>
                                    <td>
                                        <?=$dataHoraEvento?>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <?=$txtEndereco?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-state">
                                        <?=$spanAtivoHomenagem?>
                                    </td>
                                    <td class="project-actions text-right">
                                        <!--a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a-->
                                        <a class="btn btn-info btn-sm" href="javascript: void(0)" data-toggle="modal" data-target="#modal-default">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <!--a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Excluir
                                        </a-->
                                    </td>
                                </tr>                  
                                
                            </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->

                      <!-- INICIO MODAL -->
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edição do Evento</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- Horizontal Form -->
                              <div class="card card-info">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="_form_enviar.php" method="post" name="frmCadastroEvento" id="frmCadastroEvento" class="form-horizontal">
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Título</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="txtTituloEvento" name="txtTituloEvento" placeholder="Título" value="<?=$tituloEvento?>" />
                                      </div>
                                    </div>

                                    <!-- Date and time -->
                                    <div class="form-group row">
                                      <label for="inputDataHora" class="col-sm-2 col-form-label">Data/Hora:</label>
                                        
                                        <div class="col-sm-10">
                                          <div class="form-group">
                                              <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                                  <input type="text" id="txtDataHoraEvento" name="txtDataHoraEvento" class="form-control datetimepicker-input" data-target="#datetimepicker" value="<?=$dataHoraEvento?>" />
                                                  <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                    </div>
                                    <!-- /.form group -->

                                    <div class="form-group row">
                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Endereço</label>
                                      <div class="col-sm-10">
                                        <input type="text" id="txtEndereco" name="txtEndereco" class="form-control" id="inputPassword3" placeholder="Endereço" value="<?=$txtEndereco?>" />
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-sm-2 col-form-label" for="exampleCheck2">Ativo</label>
                                      <div class="col-sm-10 form-check">
                                        <input type="checkbox" id="chkAtivo" name="chkAtivo" name="my-checkbox" <?=$spanAtivoHomenagem?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                      </div>
                                    </div>

                                  </div>
                                  <!-- /.card-body -->
                                  <div class="card-footer">
                                    <!-- Acao para o cadastro do evento-->
                                    <input type="hidden" id="hdnEventoID" name="hdnEventoID" value="<?=$idEvento?>" />
                                    <input type="hidden" id="hdnAcao" name="hdnAcao" value="atualizarEvento" />

                                    <button type="submit" class="btn btn-danger float-right" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>                                    
                                  </div>
                                  <!-- /.card-footer -->
                                </form>
                              </div>
                              <!-- /.card -->
                            </div>
                            <!--div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary">Salvar</button>
                            </div-->
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <!-- FIM MODAL -->

                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.tab-pane -->
                  <!--div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div-->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->


      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script type="text/javascript" src="plugins/moment/locale/pt-br.js"></script>
<script type="text/javascript" src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<script type="text/javascript">
    $(function () {
          $('#datetimepicker').datetimepicker();

          $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>