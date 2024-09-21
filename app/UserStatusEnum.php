<?php

namespace App;

use Illuminate\Support\Str;

enum UserStatusEnum: string
{
    case Approved = 'approved';
    case Created = 'created';


    /**
     * Matching individual values
     * @return string
     */
    public function getLabel(): string
    {
        return match($this) {
            self::Approved => 'Approved',
            self::Created => 'Created'
        };
    }

    /*
     * Matching with creating a function
     */
    public function getTitle(): string
    {
        return Str::headline($this->value);
    }
}
