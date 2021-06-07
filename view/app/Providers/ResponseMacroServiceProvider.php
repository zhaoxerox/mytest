<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('horesp', function ($code=2000, $data=null, $msg=null) {
            $content =  array(
                'code'    =>  $code,
                'data'    =>  $data,
                'msg'     =>  $msg
            );
            return response()->json($content);
        });
    }
}
