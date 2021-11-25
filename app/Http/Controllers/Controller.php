<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function change_status(Model $model, $status) 
    {
        $model->active = $status;
        $model->save();

        if ($model->active == true) {
            $body = 'Статусот е променет во активен';
            $class = 'success';
        } else {
            $body = 'Статусот е променет во неактивен';
            $class = 'warning';
        }

        return ['body' => $body, 'class' => $class];
    }
}
