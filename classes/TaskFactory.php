<?php

declare(strict_types=1);

namespace AutoTeacher;

require_once __DIR__ . '/Tasks/BaseTask.php';

use AutoTeacher\Tasks\BaseTask;

class TaskFactory {

    const TASK_ADDITION = 'Addition';
    const TASK_SUBTRACTION = 'Subtraction';
    const TASK_COMPARATION = 'Comparison';

    private $_maxOperandLimit = '10';
    private $_minOperandLimit = '0';
    private $_maxResultLimit = '10';

    private $_taskType = null;

    public function createTask(): ?BaseTask {
        $task = null;
        $leftOperand = $this->getRand($this->getMinOperandLimit(), $this->getMaxOperandLimit());
        switch ($this->getTaskType()) {
            case self::TASK_ADDITION:
                $className = $this->getTaskType() . 'Task';
                $task = $this->createTaskByClassName($className);
                $maxLimit = (string) ((int) $this->getMaxResultLimit() - (int) $leftOperand);
                $rightOperand = $this->getRand($this->getMinOperandLimit(), $maxLimit);
                break;
            case self::TASK_SUBTRACTION:
                $className = $this->getTaskType() . 'Task';
                $task = $this->createTaskByClassName($className);
                $minLimit = (int) $leftOperand - (int) $this->getMaxResultLimit();
                $minLimit = $minLimit > (int) $this->getMinOperandLimit() ? (string) $minLimit : $this->getMinOperandLimit();
                $rightOperand = $this->getRand($minLimit, $leftOperand);
                break;
            case self::TASK_COMPARATION:
                $className = $this->getTaskType() . 'Task';
                $task = $this->createTaskByClassName($className);
                $rightOperand = $this->getRand($this->getMinOperandLimit(), $this->getMaxOperandLimit());
                break;
            default:
                break;
        }

        if ($task) {
            $task->setLeftOperand($leftOperand);
            $task->setRightOperand($rightOperand);
        }
        return $task;
    }

    public function getMaxOperandLimit(): string {
        return $this->_maxOperandLimit;
    }

    public function setMaxOperandLimit(string $limit): void {
        $this->_maxOperandLimit = $limit;
    }

    public function getMinOperandLimit(): string {
        return $this->_minOperandLimit;
    }

    public function setMinOperandLimit(string $limit): void {
        $this->_minOperandLimit = $limit;
    }

    public function getMaxResultLimit(): string {
        return $this->_maxResultLimit;
    }

    public function setMaxResultLimit(string $limit): void {
        $this->_maxResultLimit = $limit;
    }

    public function getTaskType(): string {
        return $this->_taskType;
    }

    public function setTaskType(string $type): void {
        $this->_taskType = $type;
    }

    private function getRand(string $from, string $to): string {
        return (string) rand((int) $from, (int) $to);
    }

    private function createTaskByClassName($className): ?BaseTask {
        $result = null;
        require_once __DIR__ . '/Tasks/' . $className . '.php';
        $fullClassName = __NAMESPACE__ . '\\Tasks\\' . $className;
        if (class_exists($fullClassName)) {
            $result = new $fullClassName();
        }
        return $result;
    }

}