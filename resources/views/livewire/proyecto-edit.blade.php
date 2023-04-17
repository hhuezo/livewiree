<div id="modal-edit-{{ $proyecto->id }}" wire:ignore.self tabindex="-1" class="modal fade" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header col">
                <h5 class="modal-title  fw-bold" id="createprojectlLabel">Modificar proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="text" wire:model.defer="id_proyecto">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select" wire:model.defer="estado_id"
                        aria-label="Default select Project Category">
                        @foreach ($estados as $obj)
                            <option value="{{ $obj->id }}" wire:key="{{ $obj->id }}">{{ $obj->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" wire:model.defer="nombre" class="form-control">
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlTextarea786" class="form-label">Descripción</label>
                    <textarea class="form-control" wire:model.defer="descripcion" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" data-bs-dismiss="modal" wire:click="update()">Create</button>
            </div>

        </div>
    </div>
</div>
