<?php

namespace App\Livewire\Website\Map\Info;

use App\Models\Yte;
use Livewire\Component;
use Livewire\Attributes\On;

class Ytes extends Component
{
    public $yte;
    public $openInfoBox = false;

    #[On('closeInfoBox')]
    public function closeInfoBox()
    {
        $this->openInfoBox = false;
        $this->yte = null;
    }
    #[On('getYteInfo')]
    public function getYteInfo($id)
    {
        $this->yte = Yte::find($id);

        $this->openInfoBox = true;
    }

    public function render()
    {
        return view('livewire.website.map.info.ytes');
    }
}
