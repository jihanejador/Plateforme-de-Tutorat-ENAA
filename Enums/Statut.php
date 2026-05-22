<?php
namespace Enums;

class Statut {
    const PENDING = 'PENDING';
    const ASSIGNED = 'ASSIGNED';
    const RESOLVED = 'RESOLVED';

    
    public static function from(string $value): string {
        return $value;
    }
}