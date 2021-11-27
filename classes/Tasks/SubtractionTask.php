<?php

declare(strict_types=1);

namespace AutoTeacher\Tasks;

require_once __DIR__ . '/BaseTask.php';

class SubtractionTask extends BaseTask {

    public function getResult(): ?string {
        if (is_null($this->getLeftOperand()) || is_null($this->getRightOperand()))
            return null;

        $result = (string) ((int) $this->getLeftOperand() - (int) $this->getRightOperand());
        return $result;
    }

    public function getExercise(): ?string {
        if (is_null($this->getLeftOperand()) || is_null($this->getRightOperand()))
            return null;

        return $this->getLeftOperand() . ' - ' . $this->getRightOperand() . ' = ';
    }


}