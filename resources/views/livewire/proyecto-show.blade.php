<div style="text-align: center">


    <div id="create_proyecto" wire:ignore.self tabindex="-1" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header col">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Nuevo proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    <button class="btn btn-primary" wire:click="store()">Create</button>
                </div>
            </div>
        </div>
    </div>



    <div id="edit_proyecto" wire:ignore.self tabindex="-1" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header col">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel">Modificar proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="mb-3">
                        <input type="hidden" wire:model.defer="id_proyecto">
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
                    <button class="btn btn-primary" wire:click="update()">Guardar</button>
                </div>
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
                                                            <span class="small text-muted project_name fw-bold">
                                                                {{ $proyecto->id }} </span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $proyecto->nombre }}
                                                            </h6>

                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <button type="button"
                                                                    wire:click="edit({{ $proyecto->id }})"
                                                                    class="btn btn-outline-secondary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_proyecto"><i
                                                                        class="icofont-edit text-success fa-lg"></i></button>

                                                                <div class="btn btn-outline-secondary"><i
                                                                        class="icofont-eye-alt text-info fa-lg"
                                                                        wire:click="actividad_show({{ $proyecto->id }})"></i>
                                                                </div>
                                                                <!--
                                                                        
                                                                       
                                                                        
                                                                        <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteproject"><i
                                                                        class="icofont-ui-delete text-danger"></i></button>-->
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p>{{ $proyecto->descripcion }}</p>

                                                        </div>

                                                        <div class="dividers-block"></div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <h4 class="small fw-bold mb-0">Progreso</h4>
                                                        </div>
                                                        <div class="progress" style="height: 10px; height: 20px;">
                                                           
                                                            @if ($proyecto->avance < 11)
                                                                <div class="progress-bar light-success-bg"
                                                                    role="progressbar"
                                                                    style="width: 10%"
                                                                    aria-valuenow="40" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    <strong>{{ $proyecto->avance }}%</strong>
                                                                </div>
                                                            @else
                                                                <div class="progress-bar light-success-bg"
                                                                    role="progressbar"
                                                                    style="width: {{ $proyecto->avance }}%"
                                                                    aria-valuenow="40" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    <strong>{{ $proyecto->avance }}%</strong>
                                                                </div>
                                                            @endif

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



    <div class="contenedor"
        style="width: 90px;
        height: 240px;
        position: absolute;
        right: 0px;
        bottom: 0px;">

        <button class="botonF1" wire:click="create()" data-bs-toggle="modal" data-bs-target="#create_proyecto"
            style=" width: 60px;
    height: 60px;
    border-radius: 100%;
    background: #484c7f;
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

</div>


<script type="text/javascript">
    window.addEventListener('close-modal', (e) => {
        $('#create_proyecto').modal('hide')
    });

    window.addEventListener('close-modal-edit', (e) => {
        $('#edit_proyecto').modal('hide')
    });
</script>