<?php

namespace App\Livewire\Website\Map\Info;

use App\Models\Admin\VungTrong;
use Livewire\Component;
use Livewire\Attributes\On;

class GrowAreas extends Component
{
    public $grow_area;
    public $openInfoBox = false;

    #[On('closeInfoBox')]
    public function closeInfoBox()
    {
        $this->openInfoBox = false;
        $this->grow_area = null;
    }
    #[On('getGrowAreaInfo')]
    public function getGrowAreaInfo($id)
    {
        $this->grow_area = VungTrong::find($id);

        $this->openInfoBox = true;
    }

    public function render()
    {
        return view('livewire.website.map.info.grow-areas');
    }
}
