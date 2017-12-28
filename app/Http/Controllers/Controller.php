<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonapi($collection, $tipo, $attributes, $code)
    {
        $obj          = new \stdClass();
        $obj->jsonapi = (Object)["version"=> "1.0"];
        $obj->code    = $code;
        foreach ($collection as $key => $i) {
            $tmp             = new \stdClass();
            $tmp->type       = $tipo;
            $tmp->id         = $i->id;
            //$tmp->attributes = (Object)['comment'=>$i->comment, 'fecha_creacion'=>Carbon::parse($i->created_at)->format('d/m/Y H:i:s')];
            $tmp_attributes = [];
            foreach ($attributes as $key2 => $value) {
                if ($value == 'created_at') {
                    $tmp_attributes[$value] = Carbon::parse($i[$value])->format('d/m/Y H:i:s');
                } else {
                    $tmp_attributes[$value] = $i[$value];
                }
            }
            $tmp->attributes = $tmp_attributes;
            $obj->data []    = $tmp;
        }
        return response()/*->header('Content-Type', 'application/vnd.api+json')*/->json($obj, $code);
    }
}
