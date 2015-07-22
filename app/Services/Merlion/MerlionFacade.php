<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 22.07.15
 * Time: 14:49
 */

namespace App\Services\Merlion;


use Illuminate\Support\Facades\Facade;

class MerlionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'merlion';
    }
}