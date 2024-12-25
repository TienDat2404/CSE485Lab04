@extends('borrowbooks.app')

@section('content')
    <div class="container">
        <h1>Show Borrow </h1>
        
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Reader Information</h5>
                <p><strong>Name:</strong> {{ $borrowbook->reader->name }}</p>
                <p><strong>ID:</strong> {{ $borrowbook->reader->id }}</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Book Information</h5>
                <p><strong>Title:</strong> {{ $borrowbook->book->name }}</p>
                <p><strong>ID:</strong> {{ $borrowbook->book->id }}</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Borrow Details</h5>
                <p><strong>Borrow Date:</strong> {{ $borrowbook->borrow_date }}</p>
                <p><strong>Return Date:</strong> {{ $borrowbook->return_date }}</p>
                <p><strong>Status:</strong> {{ $borrowbook->status ? 'Returned' : 'Borrowed' }}</p>
            </div>
        </div>

        <a href="{{ route('borrowbooks.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection