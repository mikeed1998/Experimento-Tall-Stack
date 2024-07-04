<div class="modal fade show d-block" style="background: rgba(0,0,0,.5);" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $post_id ? 'Edit Post' : 'Create Post' }}</h5>
                <button type="button" class="btn btn-outline" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true"><i class="bi bi-x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" wire:model="title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group"> 
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" placeholder="Enter Body" wire:model="body"></textarea>
                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary">Close</button>
                <button type="button" wire:click="store" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
