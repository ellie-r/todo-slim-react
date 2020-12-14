<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Models\TaskModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomePageController extends Controller
{
    private $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request,Response $response,array $args)
    {
        try {
            $statusCode = 200;
            $data = [
                'success' => true,
                'message' => 'Retrieved tasks from db.',
                'data' =>  $this->taskModel->getTasks()
            ];
        } catch (\Exception $e) {
            $statusCode = 500;
            $data['success'] = false;
            $data['message'] = $e->getMessage();
            $data['data'] = [];
        }
            return $this->respondWithJson($response, $data, $statusCode);
    }
}