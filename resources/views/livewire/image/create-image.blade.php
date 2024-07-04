<div class="modal fade show d-block" style="background: rgba(0,0,0,.5);" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Image</h5>
                <button type="button" class="btn btn-outline" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true"><i class="bi bi-x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" wire:model="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="button" wire:click="closeModal" class="btn btn-secondary">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
