<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 25/08/19
 * Time: 09:47
 */

namespace App\repositories\Core\Eloquent;

use App\Models\Event;
use Illuminate\Http\Request;
use App\repositories\Core\BaseEloquentRepository;
use App\repositories\Contracts\EventRepositoryInterface;

class EloquentEventRepository extends BaseEloquentRepository implements EventRepositoryInterface
{
    /**
     * @return string
     */
    public function entity()
    {
        return Event::class;
    }

    /**
     * Metodo de busca por title, description ou start
     *
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        return $this->entity->where(function ($query) use ($request) {

            if ( isset($request->title) && !empty($request->title) ) {
                $filter = $request->title;
                $query->where(function ($querySub) use ($filter) {
                    $querySub->where('title', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%");
                });
            }

            if ( isset($request->start) && !empty($request->start) ) {
                $query->where('start', $request->start);
            }

        })->paginate();
    }
}
