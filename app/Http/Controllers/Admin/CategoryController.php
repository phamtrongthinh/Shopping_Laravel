<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Category::query();

        $search = $request->search; // Lấy từ khóa tìm kiếm từ request

        if (!empty($search)) {
            $query->whereRaw("name REGEXP '[[:<:]]" . $search . "[[:>:]]'");
        }

        $categories = $query->orderBy('id', 'desc')->paginate(5);

        return view('admin.categorys.index', [
            'title' => 'Danh sách danh mục',
            'categories' => $categories,
            'search' => $search, // Truyền từ khóa tìm kiếm về view
        ]);
    }


    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categorys.create', ['title' => 'Tạo danh mục']);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            // dd($request->all());
            // Tạo danh mục mới
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->active ?? 1, // Nếu không có giá trị, mặc định là 1
            ]);
            return redirect()->route('admin.categorys.index')->with('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm danh mục thất bại. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $title = 'Chỉnh sửa danh mục';
            return view('admin.categorys.edit', compact('category', 'title'));
        } catch (\Exception $e) {
            return redirect()->route('admin.categorys.index')->with('error', 'Không tìm thấy danh mục.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->active ?? 1,
            ]);

            return redirect()->route('admin.categorys.index')->with('success', 'Cập nhật danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật danh mục thất bại. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id); // Tìm danh mục theo ID
            $category->delete(); // Xoá danh mục

            return redirect()->route('admin.categorys.index')->with('success', 'Xoá danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xoá danh mục thất bại. ' . $e->getMessage());
        }
    }
}
