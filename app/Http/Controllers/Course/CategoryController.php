<?php

namespace App\Http\Controllers\Course;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use App\Contracts\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected CategoryInterface $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index(): View
    {
        $categories = $this->categoryInterface->getAllCategories();

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.pages.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryInterface->createCategory($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(int $category): View
    {
        $categoryData = $this->categoryInterface->getCategoryById($category);

        return view('admin.pages.categories.edit', compact('categoryData'));
    }

    public function update(CategoryRequest $request, int $category): RedirectResponse
    {
        $this->categoryInterface->updateCategory($category, $request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(int $category): RedirectResponse
    {
        $this->categoryInterface->deleteCategory($category);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
