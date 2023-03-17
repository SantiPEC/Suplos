<div class="bs-stepper-content" id="formDocumentacionOferta" style="display:none">

                            <!-- FORMULARIO DE DATOS -->
                            <div id="documentacionOferta-part" class="content active dstepper-block" role="tablist" aria-labelledby="documentacionOferta-part-trigger">
                                <div class="callout callout-primary">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha Inicio</label>
                                                <input type="date" class="form-control" id="fechInicio" style="width:100%; heigth: 40px;" value="<?php echo date("Y-m-d");?>"><br>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Hora Inicio</label>
                                                <div class="input-group mb-3">
                                                    <input type="time" class="form-control" id="horaInicio" name="appt"min="09:00" max="18:00" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha Fin</label>
                                                <input type="date" class="form-control" id="fechInicio" style="width:100%; heigth: 40px;" value="<?php echo date("Y-m-d");?>"><br>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Hora Fin</label>
                                                <div class="input-group mb-3">
                                                    <input type="time" class="form-control" id="horaFin" name="appt"min="09:00" max="18:00" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!--<button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>-->
                                        <button type="button" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>