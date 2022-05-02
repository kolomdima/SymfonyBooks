<?php

namespace App\Model;

class BookCategoryListResponse
{
    /**
     * @var BookCategoryListItem[]
     */
    private array $item;

    /**
     * @param BookCategoryListItem[] $item
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * @return BookCategoryListItem[]
     */
    public function getItem(): array
    {
        return $this->item;
    }
}