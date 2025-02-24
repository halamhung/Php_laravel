<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
         return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        $parentCategories = Category::where('parent_id',0)->get();
        return view('admin.categories.create', compact('parentCategories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:active,inactive'
        ]);
        
        $data = $request->all();
        
        // Tạo slug duy nhất từ tên danh mục
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/categories', $filename);
            $data['image'] = 'categories/' . $filename;
        }
    
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }
    
    public function edit(Category $category){
        $parentCategories = Category::where('parent_id',0)->get();
        return view('admin.category.edit', compact('category', 'parentCategories'));

    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $filename);
            $data['image'] = 'categories/' . $filename;
        }

        $category->update($data);
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // Delete image if exists
        if ($category->image) {
            Storage::delete('public/' . $category->image);
        }
        
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }

    public function show(Category $category)
    {
        return view('admin.categories.index', compact('category'));
    }
}
