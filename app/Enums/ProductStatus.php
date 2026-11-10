<?php


namespace App\Enums;


enum ProductStatus: string
{
    case AVAILABLE = 'available';
    case SOLD = 'sold';
    case DRAFT = 'draft';
}
