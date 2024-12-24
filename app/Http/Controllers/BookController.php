<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Hiển thị form tạo mới sách
    public function create()
    {
        return view('books.create');
    }

    // Lưu sách vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        // Tạo sách mới và lưu vào cơ sở dữ liệu
        Book::create($request->all());

        // Quay lại trang danh sách sách với thông báo thành công
        return redirect()->route('books.index')->with('success', 'Thêm sách thành công.');
    }

    // Hiển thị chi tiết sách
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Hiển thị form chỉnh sửa sách
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Cập nhật sách trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        // Quay lại trang danh sách sách với thông báo thành công
        return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công.');
    }

    // Xóa sách khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // Quay lại trang danh sách sách với thông báo thành công
        return redirect()->route('books.index')->with('success', 'Xóa sách thành công.');
    }
}
