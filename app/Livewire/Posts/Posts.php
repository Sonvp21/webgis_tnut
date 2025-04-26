<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\Attributes\Title;
class Posts extends Component
{
    #[Title('Danh sách bài viết')] 
    public $posts = [];
    public function navigatecreate()
{
    return redirect('/posts/create');
}

    public function render()
    {
        $this->posts = [
            [
                'id' => 1,
                'name' => 'Post1'
            ],
            [
                'id' => 2,
                'name' => 'Post2'
            ],
            [
                'id' => 3,
                'name' => 'Post3'
            ]
        ];

        return view('livewire.posts.posts')->extends('components.layouts.app');
    }
}
