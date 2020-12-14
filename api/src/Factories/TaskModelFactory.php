<?php


namespace App\Factories;


use App\Models\TaskModel;

class TaskModelFactory
{
    public function __invoke($container)
    {
        return new TaskModel($container->get('dbConnection'));
    }
}