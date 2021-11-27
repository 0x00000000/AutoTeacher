<?php

declare(strict_types=1);

namespace AutoTeacherTest\Tasks;

use PHPUnit\Framework\TestCase;

use AutoTeacher\TaskFactory;

require_once __DIR__ . '/../../classes/TaskFactory.php';
require_once __DIR__ . '/../../classes/Tasks/SubtractionTask.php';

final class SubtractionTaskTest extends TestCase {

    private $_taskType = TaskFactory::TASK_SUBTRACTION;

    public function testOperand(): void {
        $factory = new TaskFactory();
        $factory->setTaskType($this->_taskType);
        $task = $factory->createTask();

        $operand = '5';
        $task->setLeftOperand($operand);
        $this->assertEquals($operand, $task->getLeftOperand());

        $operand = '10';
        $task->setRightOperand($operand);
        $this->assertEquals($operand, $task->getRightOperand());

        $this->assertNotEquals($task->getLeftOperand(), $task->getRightOperand());
    }

    public function testGetResult(): void {
        $factory = new TaskFactory();
        $factory->setTaskType($this->_taskType);
        $task = $factory->createTask();

        $leftOperand = '15';
        $rightOperand = '21';
        $task->setLeftOperand($leftOperand);
        $task->setRightOperand($rightOperand);
        $result = (string) ((int) $leftOperand - (int) $rightOperand);
        $this->assertEquals($result, $task->getResult());
    }

    public function testGetExercise(): void {
        $factory = new TaskFactory();
        $factory->setTaskType($this->_taskType);
        $task = $factory->createTask();

        $leftOperand = '15';
        $rightOperand = '21';
        $task->setLeftOperand($leftOperand);
        $task->setRightOperand($rightOperand);
        $result = $leftOperand . ' - ' . $rightOperand . ' = ';
        $this->assertEquals($result, $task->getExercise());
    }

}
