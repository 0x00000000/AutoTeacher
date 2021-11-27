<?php

declare(strict_types=1);

namespace AutoTeacher;

class HtmlRenderer {

    public function getHeader(): string {
        return '<html><head><link rel="stylesheet" type="text/css" href="styles.css"></head><body><div class="Content">';
    }

    public function getFooter(): string {
        return '</div></body></html>';
    }

    public function getCaption(string $title): string {
        return '<h1>' . $title . '</h1>';
    }

    public function getLine(string $title): string {
        return '<p>' . str_replace(' ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $title) . '</p>';
    }

    public function getTable($leftColumn, $rightColumn) {
        return '<table><tr><td>' . $leftColumn . '</td><td>' . $rightColumn . '</td></tr></table>';
    }

}