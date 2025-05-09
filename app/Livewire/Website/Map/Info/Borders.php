<?php

namespace App\Livewire\Website\Map\Info;

use App\Models\Border;
use Livewire\Component;
use Livewire\Attributes\On;

class Borders extends Component
{
    public $border;
    public $openInfoBox = false;

    #[On('closeInfoBox')]
    public function closeInfoBox()
    {
        $this->openInfoBox = false;
        $this->border = null;
    }
    #[On('getBorderInfo')]
    public function getBorderInfo($id)
    {
        $this->border = Border::find($id);

        $this->openInfoBox = true;
    }

    public function render()
    {
        return view('livewire.website.map.info.borders');
    }
}
