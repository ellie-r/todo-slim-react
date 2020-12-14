<?php


namespace App\Factories;




use App\Controllers\MarkAsCompleteController;

class MarkAsCompleteControllerFactory
{
    public function __invoke($container)
    {
        return new  MarkAsCompleteController($container->get('TaskModel'));
    }
}