<div class="container">
    
    {{-- 
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div> 
    --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col display-5">
                CRUD texto
            </div>
        </div>
        <div class="row">
            <div class="col py-5">
                <button wire:click="create()" class="btn btn-primary">Create Post</button>

                @if($isOpen)
                    @include('livewire.posts.create')
                @endif
            </div>
        </div>
        <div class="row border border-dark">
            <div class="col-1">
                ID
            </div>
            <div class="col-3">
                Titulo  
            </div>
            <div class="col-6">
                Descripción
            </div>
            <div class="col-2">
                Acciones
            </div>
        </div>
        @forelse ($posts as $p)
            <div class="row border">
                <div class="col-1 border">
                    {{ $p->id }}
                </div>
                <div class="col-3 border">
                    {{ $p->title }}
                </div>
                <div class="col-6 border">
                    {{ $p->body }}
                </div>
                <div class="col-2 border">
                    <div class="row">
                        <div class="col-6 px-0">
                            <button wire:click="edit({{ $p->id }})" class="btn btn-primary w-100 rounded-0">Edit</button>
                        </div>
                        <div class="col-6 px-0">
                            <button wire:click="delete({{ $p->id }})" class="btn btn-danger w-100 rounded-0">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1>No hay posts</h1>
        @endforelse
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

