<?php

namespace App\Interfaces;

interface BaseInterface {
    public function getAll(string $order, string $sort, array $columns);
    public function store($params);
    public function update($params, $id);
    public function destroy($id);
}