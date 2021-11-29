<?php

declare(strict_types=1);

namespace AutoTeacherTest\Tasks;

use PHPUnit\Framework\TestCase;

use AutoTeacher\TaskFactory;

require_once __DIR__ . '/../../classes/TaskFactory.php';
require_once __DIR__ . '/../../classes/Tasks/AdditionTask.php';

final class AdditionTaskTest extends TestCase {

    private $_taskType = TaskFactory::TASK_ADDITION;

    private $_task = null;

    public function setUp():void {
        $factory = new TaskFactory();
        $factory->setTaskType($this->_taskType);
        $this->_task = $factory->createTask();
    }

    public function testOperand(): void {
        $operand = '5';
        $this->_task->setLeftOperand($operand);
        $this->assertEquals($operand, $this->_task->getLeftOperand());

        $operand = '10';
        $this->_task->setRightOperand($operand);
        $this->assertEquals($operand, $this->_task->getRightOperand());

        $this->assertNotEquals($this->_task->getLeftOperand(), $this->_task->getRightOperand());
    }

    public function testGetResult(): void {
        $leftOperand = '15';
        $rightOperand = '21';
        $this->_task->setLeftOperand($leftOperand);
        $this->_task->setRightOperand($rightOperand);
        $result = (string) ((int) $leftOperand + (int) $rightOperand);
        $this->assertEquals($result, $this->_task->getResult());
    }

    public function testGetExercise(): void {
        $leftOperand = '15';
        $rightOperand = '21';
        $this->_task->setLeftOperand($leftOperand);
        $this->_task->setRightOperand($rightOperand);
        $result = $leftOperand . ' + ' . $rightOperand . ' = ';
        $this->assertEquals($result, $this->_task->getExercise());
    }

}
