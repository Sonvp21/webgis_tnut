<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Button extends Component
{
    public function golist(){
        return redirect()->to('/list');
    }   
    public function render()
    {
        return <<<'HTML'
        <button wire:click="golist">Đăng ký ngay</button>
        HTML;
    }
}
