<?php

declare(strict_types=1);

namespace AutoTeacher;

error_reporting(E_ALL);

use AutoTeacher\ExercisesPage;

require_once __DIR__ . '/../classes/ExercisesPage.php';

$page = new ExercisesPage();
echo $page->getContent();
