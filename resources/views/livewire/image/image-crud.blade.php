<div class="container">
   <div class="row">
        <div class="col">
            
        
            <div class="row">
                <div class="col py-5 display-5">
                    CRUD imagenes
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button wire:click="create()" class="btn btn-primary">Upload Image</button>

            @if($isOpen)
                @include('livewire.image.create-image')
            @endif
                </div>
            </div>
            <div class="row mt-5">
                @foreach($images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('img/'.$image->name) }}" alt="Imagen" class="img-fluid">
                        <button wire:click="delete({{ $image->id }})" class="btn btn-danger mt-2">Delete</button>
                    </div>
                @endforeach
            </div>
        </div>
   </div>
</div>

{{-- @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('show-toast', function (data) {
                console.log('Evento recibido:', data); // Asegúrate de ver esto en la consola
                toastr.success(data.message);
            });
        });
    </script>
@endpush --}}
