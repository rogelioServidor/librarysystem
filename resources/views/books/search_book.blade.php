@extends('layouts.app')

@section('title')
	Book
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book</div>
                <div class="panel-body">
                	@if($book != null)
						@if($book->status == 0)
						<form action="{{ url('/borrow/bookpage') }}" method="POST">
						{{csrf_field()}}
							<input type="hidden" name="book_id" value="{{$book->id}}">
							<p><button type="submit">Borrow</button></p>
						</form>
						@endif

						@if($book->status == 0)
						<form action="{{ url('/update/bookname') }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$book->id}}">
							<p>Book Name: <input type="text" name="name" value="{{$book->name}}"></p>
							<p>Status: {{$book->status ==0 ? 'not yet borrowed':'borrowed'}}</p>
							<p><button type="submit">Update</button></p>
						</form>
						@endif

						@if($book->status == 1)
						<p>Book Name: {{$book->name}}</p>
						<p>Status: {{$book->status ==0 ? 'not yet borrowed':'borrowed'}}</p>
						@endif

						@if($book->status == 0)
						<form action="{{ url('/delete/book') }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$book->id}}">
							<p><button type="submit">Delete</button></p>
						</form>
						@endif
					@else
						<p>Book Not Found.</p>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection