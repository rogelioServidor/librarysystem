@extends('layouts.app')

@section('title')
	Search Transaction
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search Transaction</div>
                <div class="panel-body">
                	<form action="{{ url('/search/transaction') }}">
						<p>Transaction Id: <input type="text" name="transaction_id"></p>
						<p><button type="submit">Submit</button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection