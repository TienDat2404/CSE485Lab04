@extends('borrowbooks.app')

@section('content')
    <div class="container">
        <h1>Edit Borrow </h1>
        <form action="{{ route('borrowbooks.update', $borrowbook->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="reader_id">Reader:</label>
                <select class="form-control" id="reader_id" name="reader_id" required>
                    <option value="">Select Reader</option>
                    @foreach($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrowbook->reader_id == $reader->id ? 'selected' : '' }}>
                            {{ $reader->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="book_id">Book:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <option value="">Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $borrowbook->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="borrow_date">Borrow Date:</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" 
                    value="{{ $borrowbook->borrow_date }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date" 
                    value="{{ $borrowbook->return_date }}" required>
            </div>

            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" id="status" name="status" 
                    {{ $borrowbook->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Returned</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('borrowbooks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection