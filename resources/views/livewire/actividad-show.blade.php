<div style="text-align: center">

    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">

        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3 class="fw-bold mb-0">
                                <a href="{{ url('proyecto/') }}"><i class="icofont-arrow-left fa-lg"></i></a>
                                {{ $proyecto->nombre }}
                            </h3>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Buscar" wire:model="busqueda">
                        </div>
                        @if ($tipo == 1)
                            <button class="btn btn-primary" wire:click="changeType"><i
                                    class="icofont-listine-dots fa-lg"></i></button>
                        @else
                            <button class="btn btn-primary" wire:click="changeType"><i
                                    class="icofont-penalty-card fa-lg"></i></button>
                        @endif

                    </div>
                </div>
            </div>

            <div
                class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
                @if ($tipo == 1)
                    @foreach ($actividades as $actividad)
                        <div class="col">
                            <div class="card teacher-card">
                                <div class="card-body  d-flex">
                                    <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                        <img src="{{ url('/') . '/images/lg/avatar3.jpg' }}" alt=""
                                            class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                        <div
                                            class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                                            <h6 class="mb-0 fw-bold d-block fs-6 mt-2">
                                                @if ($actividad->users_id)
                                                    {{ $actividad->usuario->name }}
                                                @endif
                                            </h6>
                                            <div class="btn-group mt-2" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" wire:click="edit({{ $actividad->id }})"
                                                    data-bs-target="#edit_actividad"><i
                                                        class="icofont-edit text-success"></i></button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteclient"><i
                                                        class="icofont-ui-delete text-danger"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                        <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ $actividad->id }}</h6>
                                        <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Ticket
                                            {{ $actividad->numero_ticket }}</span>
                                        <div class="video-setting-icon mt-3 pt-3 border-top">
                                            <p>{{ $actividad->descripcion }}</p>
                                        </div>
                                        <div class="progress" style="height: 10px; height: 20px;">
                                            <div class="progress-bar light-success-bg" role="progressbar"
                                                style="width: {{ $actividad->porcentaje }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <strong>{{ $actividad->porcentaje }}%</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                            <a href="{{ route('admin.app.messages') }}"
                                                class="btn btn-dark btn-sm mt-1 me-1"><i
                                                    class="icofont-ui-file me-2 fs-6"></i>Ponderación:
                                                {{ $actividad->ponderacion }}</a>
                                            <a href="{{ route('admin.out-client.clients-profile') }}"
                                                class="btn btn-dark btn-sm mt-1"><i
                                                    class="icofont-check-circled me-2 fs-6"></i>
                                                @if ($actividad->estado_id)
                                                    {{ $actividad->estado->nombre }}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ticket</th>
                                <th>Usuario</th>
                                <th>Descripción</th>
                                <th>Avance</th>
                                <th>Ponderación</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividades as $actividad)
                                <tr>
                                    <td>{{ $actividad->id }}</td>
                                    <td>{{ $actividad->numero_ticket }}</td>
                                    <td><img src="{{ URL('/') . '/images/xs/avatar3.jpg' }}"
                                            class="avatar sm rounded-circle me-2" alt="profile-image"><span>
                                            @if ($actividad->users_id)
                                                {{ $actividad->usuario->name }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $actividad->descripcion }}</td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 100%;">
                                                {{ $actividad->porcentaje }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $actividad->ponderacion }}</td>
                                    <td><span class="badge bg-info">
                                            @if ($actividad->estado_id)
                                                {{ $actividad->estado->nombre }}
                                            @endif
                                        </span>

                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"><i
                                                    class="icofont-edit text-success" data-bs-toggle="modal"
                                                    wire:click="edit({{ $actividad->id }})"
                                                    data-bs-target="#edit_actividad"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i
                                                    class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>



                @endif


            </div>


        </div>

        <div class="contenedor"
            style="width: 90px;
        height: 240px;
        position: absolute;
        right: 0px;
        bottom: 0px;">

            <button class="botonF1" wire:click="create()" data-bs-toggle="modal" data-bs-target="#create_actividad"
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







        <div id="edit_actividad" wire:ignore.self class="modal fade" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header col">
                        <h5 class="modal-title  fw-bold" id="createprojectlLabel">Modificar actividad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <input type="hidden" wire:model.defer="id_proyecto">
                    <div class="modal-body row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="hidden" wire:model.defer="id_actividad">
                            <div class="mb-3">
                                <label class="form-label">Ticket</label>
                                <input type="number" wire:model.defer="numero_ticket" class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Ponderacion</label>
                                <input type="number" step="0.01" wire:model.defer="ponderacion"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Descripcion</label>
                                <textarea class="form-control" wire:model.defer="descripcion"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Fecha inicio</label>
                                <input type="date" wire:model.defer="fecha_inicio" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoria</label>
                                <select wire:model.defer="categoria_id" class="form-control select2">
                                    <option value="">Seleccione</option>
                                    @foreach ($categorias as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" wire:model.defer="estado_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($estados as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prioridad</label>
                                <select class="form-select" wire:model.defer="prioridad_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($prioridades as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Fecha final</label>
                                <input type="date" wire:model.defer="fecha_fin" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Forma</label>
                                <input type="text" wire:model.defer="forma" class="form-control">
                            </div>




                            <div class="mb-3">
                                <label class="form-label">Usuario</label>
                                <select class="form-select" wire:model.defer="users_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($usuarios as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" wire:click="update()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="create_actividad" wire:ignore.self class="modal fade" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header col">
                        <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Nueva actividad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <input type="hidden" wire:model.defer="id_proyecto">
                    <div class="modal-body row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Ticket</label>
                                <input type="number" wire:model.defer="numero_ticket" class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Ponderacion</label>
                                <input type="number" step="0.01" wire:model.defer="ponderacion"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Descripcion</label>
                                <textarea class="form-control" wire:model.defer="descripcion"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Fecha inicio</label>
                                <input type="date" wire:model.defer="fecha_inicio" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoria</label>
                                <select wire:model.defer="categoria_id" class="form-control select2">
                                    <option value="">Seleccione</option>
                                    @foreach ($categorias as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" wire:model.defer="estado_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($estados as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prioridad</label>
                                <select class="form-select" wire:model.defer="prioridad_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($prioridades as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mb-3">
                                <label class="form-label">Fecha final</label>
                                <input type="date" wire:model.defer="fecha_fin" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Forma</label>
                                <input type="text" wire:model.defer="forma" class="form-control">
                            </div>




                            <div class="mb-3">
                                <label class="form-label">Usuario</label>
                                <select class="form-select" wire:model.defer="users_id"
                                    aria-label="Default select Project Category">
                                    <option value="">Seleccione</option>
                                    @foreach ($usuarios as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" wire:click="store()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>















    </div>












    <script type="text/javascript">
        window.addEventListener('close-modal', (e) => {
            $('#create_actividad').modal('hide')
        });

        window.addEventListener('close-modal-edit', (e) => {
            $('#edit_actividad').modal('hide')
        });
    </script>
</div>
