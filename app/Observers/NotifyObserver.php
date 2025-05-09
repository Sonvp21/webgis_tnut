<?php

namespace App\Observers;

use App\Models\Admin\Notify;
use Illuminate\Support\Str;

class NotifyObserver
{
    public function saving(Notify $notify)
    {
        $notify->title = Str::ucfirst($notify->title);
        $notify->slug = Str::slug($notify->title);
    }
}
