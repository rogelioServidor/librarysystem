@extends('layouts.app')

@section('title')
	Borrow Book
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Borrow Book</div>
                <div class="panel-body">
                    <form action="{{ url('/borrow/book') }}" method="POST">
					{{csrf_field()}}
						<p>Student Id: <input type="text" name="student_id"></p>
						<p>Student Lastname: <input type="text" name="student_lastname"></p>
						<p>Student Firstname: <input type="text" name="student_firstname"></p>
						<input type="hidden" name="book_id" value="{{$book->id}}">
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<p><button type="submit">Submit</button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection