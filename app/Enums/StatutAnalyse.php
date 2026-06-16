<?php

namespace App\Enums;

enum StatutAnalyse: string
{
    case EnAttente = 'en_attente';
    case EnCours = 'en_cours';
    case Terminee = 'terminee';
    case Echouee = 'echouee';

    public function label(): string
    {
        return match ($this) {
            self::EnAttente => 'En attente',
            self::EnCours => 'En cours',
            self::Terminee => 'Terminée',
            self::Echouee => 'Échouée',
        };
    }
}