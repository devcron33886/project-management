<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasColor, HasIcon, HasLabel
{
    case pending = 'primary';
    case in_progress = 'success';
    case completed = 'success';
    case cancelled = 'danger';
    case approved = 'A';

    public function getIcon(): string
    {
        return match ($this) {
            self::pending => 'heroicon-o-clock',
            self::in_progress => 'heroicon-o-play',
            self::completed => 'heroicon-o-check',
            self::cancelled => 'heroicon-o-x',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::pending => 'Pending',
            self::in_progress => 'In Progress',
            self::completed => 'Completed',
            self::cancelled => 'Cancelled',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::pending => 'primary',
            self::in_progress => 'success',
            self::completed => 'success',
            self::cancelled => 'danger',
            default => 'primary',
        };
    }
}
