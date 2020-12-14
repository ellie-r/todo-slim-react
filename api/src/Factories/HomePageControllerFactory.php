<?php


namespace App\Factories;


use App\Controllers\HomePageController;

class HomePageControllerFactory
{
    public function __invoke($container)
    {
        return new HomePageController($container->get('TaskModel'));
    }
}