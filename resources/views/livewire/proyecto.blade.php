<div style="text-align: center">
   <button class="btn btn-success" wire:click="update()">+</button>
   {{ $modal_id }} <br>
    {{ $modal_nombre }} <br>
    {{ $modal_descripcion}}<br>
    {{ $modal_estado_id }}
    <div id="create_proyecto" tabindex="-1" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header col">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Nuevo proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select class="form-select" wire:model.defer="estado_id"
                            aria-label="Default select Project Category">
                            @foreach ($estados as $obj)
                                <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" wire:model.defer="nombre" name="nombre" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea786" class="form-label">Descripción</label>
                        <textarea class="form-control" wire:model.defer="descripcion" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" wire:click="store()" onclick="close_modal();">Create</button>
                </div>
            </div>
        </div>
    </div>


    <div id="edit_proyecto" tabindex="-1" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header col">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel">Modificar proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="text" id="modal_id" wire:model.defer="modal_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select class="form-select" id="modal_estado_id" wire:model.defer="modal_estado_id"
                            aria-label="Default select Project Category">

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" wire:model.defer="modal_nombre" id="modal_nombre" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea786" class="form-label">Descripción</label>
                        <textarea class="form-control" id="modal_descripcion" wire:model.defer="modal_descripcion" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" wire:click="update()">Create</button>
                </div>
                {{$count}}
            </div>
        </div>
    </div>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: left;">
                                <h3 class="fw-bold mb-0">Proyectos</h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" placeholder="Buscar" wire:model="busqueda">
                            </div>


                        </div>
                    </div>

                </div>














                <div
                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-xxl-12 mt-xl-12 mt-lg-12 mt-md-12 mt-sm-12 mt-12 row">



                    @foreach ($estados as $estado)
                        <div
                            class="tab-content mt-4 col-xxl-4 col-xl-4 col-lg-4 col-md-4 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-12 mt-sm-12 mt-12">
                            <h3>{{ $estado->nombre }}</h3>
                            <div class="tab-pane fade show active" id="All-list">

                                <div class="g-3 gy-5 py-3 deck">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        @foreach ($proyectos as $proyecto)
                                            @if ($proyecto->estado_id == $estado->id)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mt-5">

<!--data-bs-target="#edit_proyecto" -->
                                                            <span class="small text-muted project_name fw-bold">
                                                                {{ $proyecto->nombre }} </span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">UI/UX Design</h6>

                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary"
                                                                    data-bs-toggle="modal"
                                                                    ><i data-bs-target="#edit_proyecto"
                                                                        class="icofont-edit text-success"
                                                                        wire:click="edit({{ $proyecto->id }})"></i></button>
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteproject"><i
                                                                        class="icofont-ui-delete text-danger"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p>{{ $proyecto->descripcion }}</p>

                                                        </div>
                                                        <div class="row g-2 pt-4">
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-paper-clip"></i>
                                                                    <span class="ms-2">5 Attach</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-sand-clock"></i>
                                                                    <span class="ms-2">4 Month</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-group-students "></i>
                                                                    <span class="ms-2">5 Members</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-ui-text-chat"></i>
                                                                    <span class="ms-2">10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dividers-block"></div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <h4 class="small fw-bold mb-0">Progress</h4>
                                                            <span class="small light-danger-bg  p-1 rounded"><i
                                                                    class="icofont-ui-clock"></i> 35 Days Left</span>
                                                        </div>
                                                        <div class="progress" style="height: 8px;">
                                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                                style="width: 25%" aria-valuenow="15"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                            <div class="progress-bar bg-secondary ms-1"
                                                                role="progressbar" style="width: 25%"
                                                                aria-valuenow="30" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                            <div class="progress-bar bg-secondary ms-1"
                                                                role="progressbar" style="width: 10%"
                                                                aria-valuenow="10" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach












                </div>

            </div>
        </div>
    </div>
</div>
<div class="contenedor"
    style="width: 90px;
        height: 240px;
        position: absolute;
        right: 0px;
        bottom: 0px;">
    <button class="botonF1" data-bs-toggle="modal" data-bs-target="#create_proyecto"
        style=" width: 60px;
    height: 60px;
    border-radius: 100%;
    background: #2196F3;
    right: 0;
    bottom: 0;
    position: absolute;
    margin-right: 16px;
    margin-bottom: 16px;
    border: none;
    outline: none;
    color: #FFF;
    font-size: 36px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    transition: .3s;">
        <span>+</span>
    </button>

</div>

<script src="{{ asset('assets/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        //alert('');
    });

    function close_modal() {
        $('#create_proyecto').modal('hide');
    }

    function edit(id) {

        $.get("{{ url('proyecto') }}" + '/' + id, function(data) {
            //console.log(data.estados[0].id);

            var _select = '';
            for (var i = 0; i < data.estados.length; i++) {
                if (data.proyecto[0].estado_id == data.estados[i].id) {
                    _select += '<option value="' + data.estados[i].id + '"  selected>' + data.estados[i]
                        .nombre +
                        '</option>';
                } else {
                    _select += '<option value="' + data.estados[i].id + '"  >' + data.estados[i].nombre +
                        '</option>';
                }
            }
            $(modal_estado_id).html(_select);
            document.getElementById('modal_id').value =  data.proyecto[0].id;
            document.getElementById('modal_nombre').value =  data.proyecto[0].nombre;
            document.getElementById('modal_descripcion').value =  data.proyecto[0].descripcion;
            console.log(data);

           
        });

    }
</script>
