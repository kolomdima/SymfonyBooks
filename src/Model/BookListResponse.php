<?php

namespace App\Model;

class BookListResponse
{
    /**
     * @var BookListItem[]
     */
    private array $item;

    /**
     * @param BookListItem[] $item
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * @return BookListItem[]
     */
    public function getItem(): array
    {
        return $this->item;
    }
}