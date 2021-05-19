<?php

namespace App\Observers;

class PageObserver
{
    public function created($model)
    {
        $model->sort_order  = $model->id ;
        $model->save();
    }
}
