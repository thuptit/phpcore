<?php 
    abstract class CrudAbstract{
        abstract public function create($model);
        abstract public function getById($id);
        abstract public function delete($id);
        abstract public function update($model);
        abstract public function getAll($model);
    }
?>