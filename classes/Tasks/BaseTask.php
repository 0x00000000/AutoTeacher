<?php

declare(strict_types=1);

namespace AutoTeacher\Tasks;

abstract class BaseTask {

    private $_leftOperand = null;

    private $_rightOperand = null;

    abstract public function getResult(): ?string;

    abstract public function getExercise(): ?string;

    public function getLeftOperand(): ?string {
        return $this->_leftOperand;
    }

    public function setLeftOperand(string $operand): void {
        $this->_leftOperand = $operand;
    }

    public function getRightOperand(): ?string {
        return $this->_rightOperand;
    }

    public function setRightOperand(string $operand): void {
        $this->_rightOperand = $operand;
    }

}