@extends('layouts.app')

@section('title')
	Add Book
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Book</div>
                <div class="panel-body">
                	<form action="{{ url('/add/book') }}" method="POST">
						{{csrf_field()}}
						<input type="text" name="name">
						<button type="submit">Add</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection