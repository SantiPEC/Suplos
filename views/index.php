<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="../template/img/logoSuplos.png">
    <title>SUPLOS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../template/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../template/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="../template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">


</head>

<body class="sidebar-collapse">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" role="button"></a>
                </li>
            </ul>
        </nav>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <center>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4>PROCESOS/EVENTOS</h4>
                                    <div id="eventos">
                                        <p>Modal de registro de procesos</p>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="ion-social-dropbox"></i>
                                </div>
                                <a class="small-box-footer" id="acceder" onclick="accederEventos()">Acceder<i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </section>
    <div id="modales">
        <!-- MODAL -->
        <div class="modal fade bd-example-modal-xl" id="modalRegistro" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Proceso / Evento participación cerrada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- STEPPER -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="bs-stepper linear">
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- your steps here -->
                                                <div class="step active" data-target="#informacionBasica-part"
                                                    onclick="verFormularioRegistro(1)">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="informacionBasica-part"
                                                        id="informacionBasica-part-trigger" aria-selected="true">
                                                        <span class="bs-stepper-circle">1</span>
                                                        <span class="bs-stepper-label">Informacion Basica</span>
                                                    </button>
                                                </div>

                                                <!--CRONOGRAMA-->
                                                <div class="line"></div>
                                                <div class="step" data-target="#cronograma-part"
                                                    onclick="verFormularioRegistro(2)">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="cronograma-part" id="cronograma-part-trigger">
                                                        <span class="bs-stepper-circle">2</span>
                                                        <span class="bs-stepper-label">Cronograma</span>
                                                    </button>
                                                </div>
                                                <!-- Documentacion peticion de oferta -->
                                                <div class="line"></div>
                                                <div class="step" data-target="#documentacionOferta-part"
                                                    onclick="verFormularioRegistro(3)">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="documentacionOferta-part"
                                                        id="documentacionOferta-part-trigger" aria-selected="false">
                                                        <span class="bs-stepper-circle">3</span>
                                                        <span class="bs-stepper-label">Documentación petición de
                                                            oferta</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content" id="formInfoBasica">
                                                <!-- FORMULARIO DE DATOS -->
                                                <div id="informacionBasica-part" class="content active dstepper-block"
                                                    role="tabpanel" aria-labelledby="informacionBasica-part-trigger">
                                                    <h2>Información Básica</h2><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Objeto</label>
                                                                <input class="form-control" name="state"
                                                                    id="inputObjeto" style="width:100%; heigth: 40px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Actividad</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon2"><i
                                                                            class="fas fa-search"></i></span>
                                                                    <select class="form-control" id="selectActividad"
                                                                        aria-describedby="basic-addon2"
                                                                        style="width:90%; heigth: 60px;">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Descripcion / Alcance</label>
                                                                <textarea class="form-control" name="state"
                                                                    id="inputDescripcion"
                                                                    style="width:100%; heigth: 60px;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Moneda</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon2"><i
                                                                            class="fas fa-list-ul"></i></span>
                                                                    <select class="form-control" id="selectMoneda"
                                                                        aria-describedby="basic-addon2"
                                                                        style="width:50%; heigth: 60px;">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Presupuesto</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon2"><i
                                                                            class="fas fa-dollar-sign"></i></span>
                                                                    <input type="number" class="form-control"
                                                                        id="inputPrespuesto"
                                                                        aria-describedby="basic-addon2"
                                                                        style="width:50%; heigth: 60px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<Form cronograma>-->
                                            <div class="bs-stepper-content" id="formCronograma" style="display:none">

                                                <!-- FORMULARIO DE DATOS -->
                                                <div id="informacionBasica-part" class="content active dstepper-block"
                                                    role="tablist" aria-labelledby="informacionBasica-part-trigger">
                                                    <h2>Cronograma</h2><br>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha Inicio</label>
                                                                <input type="date" class="form-control"
                                                                    id="dateFechaInicio"
                                                                    style="width:100%; heigth: 40px;"
                                                                    value="<?php echo date("Y-m-d");?>"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Hora Inicio</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="time" class="form-control"
                                                                        id="timeHoraInicio" name="appt" min="09:00"
                                                                        max="18:00" required>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha Fin</label>
                                                                <input type="date" class="form-control"
                                                                    id="dateFechaFin" style="width:100%; heigth: 40px;"
                                                                    value="<?php echo date("Y-m-d");?>"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Hora Fin</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="time" class="form-control"
                                                                        id="timeHoraFin" name="appt" min="09:00"
                                                                        max="18:00" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content" id="formDocumentacionOferta"
                                                style="display:none">
                                                <!-- FORMULARIO DE DATOS -->
                                                <div id="documentacionOferta-part" class="content active dstepper-block"
                                                    role="tablist" aria-labelledby="documentacionOferta-part-trigger">
                                                    <h4>Contenido - Documentación petición de ofertas / Términos y
                                                        condiciones del Proceso</h4><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Ingresa los archivos requeridos para el
                                                                    proceso</label>
                                                                <form method="post"
                                                                    enctype="multipart/form-data"
                                                                    id="formCargarArchivos">
                                                                    <input multiple type="file" class="form-control"
                                                                        id="inputVariosArchivos" name="archivos[]"><br>
                                                                </form>
                                                                <button id="btnSubirArchivos" class="btn btn-primary"
                                                                    onclick="subirArchivos();">Agregar
                                                                    Contenido</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <center><button type="button" class="btn btn-success"
                                    onclick="guardaProceso()">Guardar</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-xl" id="modalConsulta" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Procesos / Evento participación cerrada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- STEPPER -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="bs-stepper linear">
                                            <div class="bs-stepper-content" id="formConsulta">
                                                <!-- FORMULARIO DE DATOS -->
                                                <div id="informacionBasica-part" class="content active dstepper-block"
                                                    role="tabpanel" aria-labelledby="informacionBasica-part-trigger">
                                                    <h4>Búsqueda</h4><br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>ID Cerrada</label>
                                                                <input type="number" class="form-control" name="IdCerrada"
                                                                    id="inputIdCerrada" style="width:100%; heigth: 40px;"
                                                                    placeholder="Número id procesos / eventos" data-index="1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Objeto / Descripción</label>
                                                                <input type="text"class="form-control" name="ObjetoDescripcion"
                                                                    id="inputObjetoDescripcion"
                                                                    style="width:100%; heigth: 60px;"
                                                                    placeholder="Objeto / Descripción">
                                                            </div>
                                                        </div>
                                                        <!--no definido en la prueba-->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Comprador</label>
                                                                <input class="form-control" name="compradorProceso"
                                                                    id="inputComprador"
                                                                    style="width:100%; heigth: 60px;"
                                                                    placeholder="Responsable Evento">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon2"><i
                                                                            class="fas fa-search"></i></span>
                                                                    <select class="form-control"
                                                                        id="selectEstadoProceso"
                                                                        aria-describedby="basic-addon2"
                                                                        style="width:80%; heigth: 60px;"  data-index="11">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <button type="button" class="btn btn-info"
                                                        onclick="dataTableConsultar();ocultarDataTableConsultar();">Buscar</button>
                                                </div>
                                                
                                                <div class="mt-5" id="ocultar" style="display:none;">
                                                    <table id="tabla_consulta_Procesos"
                                                        class="display responsive nowrap" style="width:100%">
                                                        <thead class="bg-info">
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Objeto</th>
                                                                <th>Descripción</th>
                                                                <th>Fecha Inicio</th>
                                                                <th>Fecha Cierre</th>
                                                                <th>Estado</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="ListadoProcesos">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCargaArchivos" role="dialog">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <h4 class="modal-title"><b>Cargue de archivos del proceso</b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- FORMULARIO REGISTRO DE CONTENIDO-->
                    <form class="form">
                        <div class="row">
                            <div id="documentacionOferta-part" class="content active dstepper-block" role="tablist"
                                aria-labelledby="documentacionOferta-part-trigger">
                                <h4>Contenido - Documentación petición de ofertas / Términos y
                                    condiciones del Proceso</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ingresa los archivos requeridos para el
                                                proceso</label>
                                            <form action="subirArchivos.php" method="post" enctype="multipart/form-data"
                                                id="formCargarArchivos">
                                                <input multiple type="file" class="form-control"
                                                    id="inputVariosArchivos" name="archivos[]"><br>
                                            </form>
                                            <button id="btnSubirArchivos" class="btn btn-primary"
                                                onclick="subirArchivos();">Agregar Contenido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"><b>&nbsp;Close</b></i></button>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Santiago Posada Espinosa <a
                href="https://www.linkedin.com/in/santiago-posada-espinosa-50b2a8210/">linkedin</a>.</strong>
        <div class="float-right d-none d-sm-inline-block"><b>2023</b>
        </div>
    </footer>
    </div>



    
</body>

</html>

<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>


<!-- jQuery UI 1.11.4 -->
<script src="../template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="../template/plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../Js/scriptVista.js"></script>
<script src="../template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="../template/plugins/select2/js/select2.min.js"></script>
<script src="../template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#selectMoneda').select2();
    $('#selectActividad').select2();
    $('#selectEstadoProceso').select2();
    listarMoneda();
    listarActividad();
    listarEstado();
});
</script>