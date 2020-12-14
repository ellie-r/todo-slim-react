<?php


namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\TaskModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MarkAsCompleteController extends Controller
{
    private $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request,Response $response,array $args)
    {
        $data = ['success' => false, 'msg' => 'Could not mark as complete', 'data' => []];
        $statusCode = 400;
        try {
            $successfulUpdate = $this->taskModel->markAsComplete($args['id']);
            if ($successfulUpdate) {
                $data['success'] = true;
                $data['msg'] = 'Task marked as complete';
                $data['data'] = [];
                $statusCode = 200;
            }
        } catch (\Exception $e) {
            $statusCode = 500;
            $data['msg'] = $e->getMessage();
        }
        return $this->respondWithJson($response, $data, $statusCode);
    }
}