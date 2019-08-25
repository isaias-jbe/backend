<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 25/08/19
 * Time: 10:01
 */

namespace App\repositories\Core\Eloquent;


use App\Models\User;
use Illuminate\Http\Request;
use App\repositories\Core\BaseEloquentRepository;
use App\repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function entity()
    {
        return User::class;
    }

    public function search(Request $request)
    {
        return $this->entity->where(function ($query) use ($request) {

            if ( isset($request->name) && !empty($request->name) ) {
                $filter = $request->name;
                $query->where(function ($querySub) use ($filter) {
                    $querySub->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('email', 'LIKE', "%{$filter}%")
                        ->orWhere('phone', 'LIKE', "%{$filter}%");
                });
            }

            if ( isset($request->category) && !empty($request->category) ) {
                $query->where('category_id', $request->category);
            }
        })->paginate();
    }
}
