<?php

namespace App\tests;

use App\Entity\BookCategory;
use App\Model\BookCategoryListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;
use App\Service\BookCategoryService;

class BookCategoryServiceTest extends TestCase
{

    public function testGetCategories():void
    {
        $repository = $this->createMock(BookCategoryRepository::class);
        $repository->expects($this->once())
            ->method('FindBy')
            ->with([],['title'=>Criteria::ASC])
            ->willReturn([(new BookCategory())->setId(7)->setTitle('Test')->setSlug('test')]);

        $service = new BookCategoryService($repository);
        $expected = new BookCategoryListResponse([new BookCategoryListItem(7,'Test','test')]);

        $this->assertEquals($expected, $service->getCategories());



    }
}
