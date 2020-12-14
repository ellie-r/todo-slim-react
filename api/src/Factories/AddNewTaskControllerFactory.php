<?php


namespace App\Factories;


use App\Controllers\AddNewTaskController;

class AddNewTaskControllerFactory
{
    public function __invoke($container)
    {
        return new AddNewTaskController($container->get('TaskModel'));
    }
}