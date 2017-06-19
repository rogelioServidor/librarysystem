@extends('layouts.app')

@section('title')
	Return Book
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Return Book</div>
                <div class="panel-body">
                	@if($transaction != null)
                	<form action="{{ url('/return/book') }}" method="POST">
					{{csrf_field()}}
						<p>Transaction Id: {{$transaction->id}}</p>
						<input type="hidden" name="transaction_id" value="{{$transaction->id}}">
						<p>Student Id: {{$transaction->student_id}}</p>
						<input type="hidden" name="student_id" value="{{$transaction->student_id}}">
						<p>Student Lastname: {{$transaction->student_lastname}}</p>
						<input type="hidden" name="student_lastname" value="{{$transaction->student_lastname}}">
						<p>Student Firstname: {{$transaction->student_firstname}}</p>
						<input type="hidden" name="student_firstname" value="{{$transaction->student_firstname}}">
						<p>Book Id: {{$transaction->book_id}}</p>
						<input type="hidden" name="book_id" value="{{$transaction->book_id}}">
						<p>User Id: {{$transaction->user_id}}</p>
						<p>Status: {{$transaction->status ==0 ? 'Not Yet Returned':'Returned'}}</p>
						@if($transaction->status == 0)
						<p><button type="submit">Return</button></p>
						@endif
					</form>
					@else
						<p>Transaction Not Found</p>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection