<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Image;

class ImageCrud extends Component
{
    use WithFileUploads;

    public $image;
    public $isOpen = false;

    public function render()
    {
        $images = Image::all();
        return view('livewire.image.image-crud', [
            'images' => $images,
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->image = null;
    }

    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $path = $this->image->store('img', 'local');
        $imageName = basename($path);

        Image::create([
            'name' => $imageName,
            'path' => 'img/' . $imageName,
        ]);

        $this->closeModal();
        $this->resetInputFields();

        session()->flash('message', 'Imagen subida con éxito.');
        $this->emit('show-toast', ['message' => 'Imagen subida con éxito.']);
    }

    public function delete($id)
    {
        $image = Image::findOrFail($id);
        $img = 'img/'.$image->name;
        unlink($img);
        $image->delete();

        session()->flash('message', 'La imagen fue eliminada.');
        $this->emit('show-toast', ['message' => 'La imagen fue eliminada.']);
    }
}
