<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $isOpen = 0;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts.posts');
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
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $message = $this->post_id ? 'Post actualizado con éxito.' : 'Post creado con éxito.';

        $this->closeModal();
        $this->resetInputFields();

        session()->flash('message', $message);
        $this->emit('show-toast', ['message' => $message]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
        $this->emit('show-toast', ['message' => 'Post eliminado con éxito']);
    }
}
