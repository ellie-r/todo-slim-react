<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Models\TaskModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddNewTaskController extends Controller
{
    private $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request,Response $response,array $args)
    {
        $userData = $request->getParsedBody();
        $task = $userData['taskName'];
        if(!$task) {
            $statusCode = 400;
            $data['message'] = 'You must type a task';
            $data['data'] = [];
        } else {
            try {
                $update = $this->taskModel->addNewTask($task);
                if ($update) {
                    $statusCode = 200;
                    $data = [
                        'success' => true,
                        'message' => 'Added new task successfully',
                        'data' =>  []
                    ];
                }
            } catch (\Exception $e) {
                $statusCode = 500;
                $data['success'] = false;
                $data['message'] = $e->getMessage();
                $data['data'] = [];
            }
        }
        return $this->respondWithJson($response, $data, $statusCode);
    }
}