<?php

namespace App\Observers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Log;

class ModelObserver
{
    public function creating($model)
    {
        if (Helper::current_user()) {
            $model->created_by = Helper::current_user_id();
            $model->updated_by = Helper::current_user_id();
        }
        Log::error("shit");
    }


    public function updating($model)
    {
        $model->updated_by = Helper::current_user_id();
    }

    // public function deleted($model)
    // {
    //     $model->deleted_by =  Helper::current_user_id();
    //     $model->save();
    // }
}
