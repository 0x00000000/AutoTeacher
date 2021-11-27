<?php

declare(strict_types=1);

namespace AutoTeacher;

require_once __DIR__ . '/TaskFactory.php';
require_once __DIR__ . '/HtmlRenderer.php';

use AutoTeacher\TaskFactory;
use AutoTeacher\HtmlRenderer;

class ExercisesPage {

    const BLOCKS_SETTINGS = array(
        TaskFactory::TASK_ADDITION => array(
            'caption' => '+',
            'linesCount' => 6,
            'minOperandLimit' => '0',
            'maxOperandLimit' => '10',
            'maxResultLimit' => '12',
        ),
        TaskFactory::TASK_SUBTRACTION => array(
            'caption' => '-',
            'linesCount' => 6,
            'minOperandLimit' => '0',
            'maxOperandLimit' => '7',
            'maxResultLimit' => '5',
        ),
        TaskFactory::TASK_COMPARATION => array(
            'caption' => '<=>',
            'linesCount' => 6,
            'minOperandLimit' => '0',
            'maxOperandLimit' => '99',
            'maxResultLimit' => '99',
        ),
    );

    private $_renderer = null;

    public function __construct() {
        $this->_renderer = new HtmlRenderer();
    }

    public function getContent(): string {
        $content = '';
        $content .= $this->_renderer->getHeader();
        $content .= $this->getBlock(TaskFactory::TASK_ADDITION);
        $content .= $this->getBlock(TaskFactory::TASK_SUBTRACTION);
        $content .= $this->getBlock(TaskFactory::TASK_COMPARATION);
        $content .= $this->_renderer->getFooter();

        return $content;
    }

    private function getBlock($taskType): string {
        $renderer = new HtmlRenderer();
        $settings = self::BLOCKS_SETTINGS[$taskType];
        $content = $renderer->getCaption($settings['caption']);
        $factory = new TaskFactory();
        $factory->setTaskType($taskType);
        $factory->setMaxOperandLimit($settings['maxOperandLimit']);
        $factory->setMinOperandLimit($settings['minOperandLimit']);
        $factory->setMaxResultLimit($settings['maxResultLimit']);
        $leftColumn = '';
        $rightColumn = '';
        for ($i = 0; $i < $settings['linesCount']; $i++) {
            $task = $factory->createTask();
            $leftColumn .= $renderer->getLine($task->getExercise());
            $task = $factory->createTask();
            $rightColumn .= $renderer->getLine($task->getExercise());
        }
        $content .= $renderer->getTable($leftColumn, $rightColumn);
        return $content;
    }

}