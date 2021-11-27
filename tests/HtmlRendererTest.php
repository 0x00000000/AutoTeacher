<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use AutoTeacher\HtmlRenderer;

require_once __DIR__ . '/../classes/HtmlRenderer.php';

final class HtmlRendererTest extends TestCase {
    private $_renderer = null;

    public function __construct() {
        parent::__construct();
        $this->_renderer = new HtmlRenderer();
    }

    public function testGetHeader() {
        $this->assertTrue(strpos($this->_renderer->getHeader(), '<html>') !== false);
    }

    public function testGetFooter() {
        $this->assertTrue(strpos($this->_renderer->getFooter(), '</html>') !== false);
    }

    public function testGetCaption() {
        $text = 'Test caption';
        $caption = $this->_renderer->getCaption($text);
        $this->assertTrue(strpos($caption, $text) !== false);
        $this->assertTrue(strpos($caption, '<h1>') !== false);
    }

    public function testGetLine() {
        $text = 'Test_line_no_spaces';
        $line = $this->_renderer->getLine($text);
        $this->assertTrue(strpos($line, $text) !== false);
        $this->assertTrue(strpos($line, '<p>') !== false);
    }

    public function testGetTable() {
        $textColumn1 = 'Test column 1';
        $textColumn2 = 'Test column 2';
        $table = $this->_renderer->getTable($textColumn1, $textColumn2);
        $this->assertTrue(strpos($table, $textColumn1) !== false);
        $this->assertTrue(strpos($table, $textColumn2) !== false);
        $this->assertTrue(strpos($table, '<table>') !== false);
    }

}