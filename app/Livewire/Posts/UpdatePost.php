<?php

namespace App\Livewire\Posts;
use App\Models\Post;
use Livewire\Component;

class UpdatePost extends Component
{
    public $post = null;
    public function mount($id){
        $this->post = Post::find($id);
          dd($this->post);}
    public function render()
    {
        return view('livewire.posts.update-post')->extends('components.layouts.app');
    }
}
