@extends('books.layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin sách</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên sách:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required>
            </div>
            <div class="form-group">
                <label for="author">Tác giả:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="category">Thể loại:</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}" required>
            </div>
            <div class="form-group">
                <label for="year">Năm xuất bản:</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        </form>
    </div>
@endsection
