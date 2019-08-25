<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 25/08/19
 * Time: 09:33
 */

namespace App\repositories\Core;

use App\Repositories\Exceptions\NotEntityDefined;
use App\repositories\Contracts\RepositoryInterface;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function getAll()
    {
        return $this->entity->get();
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
    }

    public function findWhere(string $column, $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst(string $column, $value)
    {
        return $this->entity->where($column, $value)->first();
    }

    public function paginate(int $totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(int $id, array $data)
    {
        $entity = $this->findById($id);

        return $entity->update($data);
    }

    public function destroy(int $id)
    {
        return $this->entity->find($id)->delete();
    }

    public function relationships(...$relationships)
    {
        $this->entity = $this->entity->with($relationships);

        return $this;
    }

    public function orderBy(string $column, string $order = 'DESC')
    {
        $this->entity = $this->entity->orderBy($column, $order);

        return $this;
    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }

        return app($this->entity());
    }
}
