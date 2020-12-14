<?php


namespace App\Models;


class TaskModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTasks(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `tasks` WHERE `complete`=0;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addNewTask(string $name)
    {
        $query = $this->db->prepare('INSERT INTO `tasks` (`name`) VALUES (?);');
        return $query->execute([$name]);
    }

    public function markAsComplete(int $id)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `complete` = 1 WHERE `id` = (?);');
        return $query->execute([$id]);
    }
}