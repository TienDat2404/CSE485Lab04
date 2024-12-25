@extends('borrowbooks.app')

@section('content')
    <div class="container">
        <h1>Borrow Records</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Reader</th>
                    <th>Book</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrowbook)
                    <tr>
                        <td>{{ $borrowbook->reader->name }}</td>
                        <td>{{ $borrowbook->book->name }}</td>
                        <td>{{ $borrowbook->borrow_date }}</td>
                        <td>{{ $borrowbook->return_date }}</td>
                        <td>{{ $borrowbook->status ? 'Returned' : 'Borrowed' }}</td>
                        <td>
                            <a href="{{ route('borrowbooks.show', $borrowbook->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('borrowbooks.edit', $borrowbook->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('borrowbooks.destroy', $borrowbook->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection