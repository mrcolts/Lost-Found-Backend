<?php


namespace App\Http\Controllers;


use App\Http\Resources\CategoriesResource;
use App\Models\Category;

class CategoriesController extends BaseController
{
    public function index()
    {
        return $this->success(
            CategoriesResource::collection(Category::all()),
            'Categories retrieved successfully.'
        );
    }
}