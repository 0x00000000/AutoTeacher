<?php

declare(strict_types=1);

namespace AutoTeacherTest;

use PHPUnit\Framework\TestCase;

use AutoTeacher\ExercisesPage;

require_once __DIR__ . '/../classes/ExercisesPage.php';

final class ExercisesPageTest extends TestCase {

    public function testGetContent() {
        $page = new ExercisesPage();
        $output = $page->getContent();
        $this->assertTrue(strlen($output) > 0);
    }

}