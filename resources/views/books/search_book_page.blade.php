@extends('layouts.app')

@section('title')
	Search Book
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search Book</div>
                <div class="panel-body">
                	<form action="{{ url('/search/book') }}">
						<p>Book Name: <input type="text" name="bookname"></p>
						<p><button type="submit">Search</button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection