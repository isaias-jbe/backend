<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 25/08/19
 * Time: 09:36
 */

namespace App\repositories\Contracts;


interface RepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function findWhere(string $column, $value);
    public function findWhereFirst(string $column, $value);
    public function paginate(int $totalPage = 10);
    public function store(array $data);
    public function update(int $id, array $data);
    public function destroy(int $id);
    public function orderBy(string $column, string $order = 'DESC');
}
