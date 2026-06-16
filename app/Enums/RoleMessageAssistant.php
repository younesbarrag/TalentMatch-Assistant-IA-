<?php

namespace App\Enums;

enum RoleMessageAssistant: string
{
    case User = 'user';
    case Assistant = 'assistant';
    case Tool = 'tool';
    case System = 'system';

    public function label(): string
    {
        return match ($this) {
            self::User => 'Utilisateur',
            self::Assistant => 'Assistant IA',
            self::Tool => 'Tool Laravel',
            self::System => 'Système',
        };
    }
}