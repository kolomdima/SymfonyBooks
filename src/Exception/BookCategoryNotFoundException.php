<?php

namespace App\Exception;


use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class BookCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('book category not found', Response::HTTP_NOT_FOUND);
    }
}