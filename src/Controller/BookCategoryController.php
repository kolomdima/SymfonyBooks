<?php

namespace App\Controller;

use App\Service\BookCategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\BookCategoryListResponse;

class BookCategoryController extends AbstractController
{
    //test
    public function __construct(private BookCategoryService $bookCategoryService)
    {
    }

    /**
     * @Oa\Response(
     *     response=200,
     *     description = "Returns book categories",
     *     @Model(type=BookCategoryListResponse::class)
     * )
     */
    #[Route(path: '/api/v1/book/categories', methods: 'GET')]
    public function Categories():Response
    {
        return $this->json($this->bookCategoryService->getCategories());
    }
}