<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 25/08/19
 * Time: 09:45
 */

namespace App\repositories\Contracts;

use Illuminate\Http\Request;

interface EventRepositoryInterface
{
    public function search(Request $request);
}
