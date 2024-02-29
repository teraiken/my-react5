<?php

namespace App\Enums;

enum BookCategory: string
{
    case React = 'React';
    case Vue = 'Vue';
    case Laravel = 'Laravel';

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            BookCategory::React => 'React',
            BookCategory::Vue => 'Vue',
            BookCategory::Laravel => 'Laravel',
        };
    }
}
