<?php

declare(strict_types=1);

namespace AutoTeacherTest;

use PHPUnit\Framework\TestCase;

use AutoTeacher\TaskFactory;

require_once __DIR__ . '/../classes/TaskFactory.php';

final class TaskFactoryTest extends TestCase {
    
    public function testCreateTestAddition(): void {
        $factory = new TaskFactory();
        $factory->setTaskType(TaskFactory::TASK_ADDITION);
        $task = $factory->createTask();
        $this->assertTrue(! empty($task));
    }
    
    public function testCreateTestSubtraction(): void {
        $factory = new TaskFactory();
        $factory->setTaskType(TaskFactory::TASK_SUBTRACTION);
        $task = $factory->createTask();
        $this->assertTrue(! empty($task));
    }
    
    public function testCreateTestComparison(): void {
        $factory = new TaskFactory();
        $factory->setTaskType(TaskFactory::TASK_COMPARATION);
        $task = $factory->createTask();
        $this->assertTrue(! empty($task));
    }

    public function testLimit(): void {
        $factory = new TaskFactory();

        $limit = '20';
        $factory->setMaxOperandLimit($limit);
        $this->assertEquals($limit, $factory->getMaxOperandLimit());

        $limit = '5';
        $factory->setMinOperandLimit($limit);
        $this->assertEquals($limit, $factory->getMinOperandLimit());

        $limit = '30';
        $factory->setMaxResultLimit($limit);
        $this->assertEquals($limit, $factory->getMaxResultLimit());

        $this->assertNotEquals($factory->getMaxOperandLimit(), $factory->getMinOperandLimit());
        $this->assertNotEquals($factory->getMaxOperandLimit(), $factory->getMaxResultLimit());
    }

    public function testTaskType(): void {
        $factory = new TaskFactory();
        $type = TaskFactory::TASK_ADDITION;
        $factory->setTaskType($type);
        $this->assertEquals($type, $factory->getTaskType());
    }

}
