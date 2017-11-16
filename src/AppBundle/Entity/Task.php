<?php
/**
 * Created by PhpStorm.
 * User: Рыжаков
 * Date: 06.10.2017
 * Time: 12:42
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Task
{
    /**
     * @Assert\NotBlank()
     */
    protected $task;
    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;
    public function getTask()
    {
        return $this->task;
    }
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }
    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}