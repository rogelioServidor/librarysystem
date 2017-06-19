@extends('layouts.app')

@section('title')
	Add User
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add User</div>

                <div class="panel-body">
                	<form action="{{ url('/add/user') }}" method="POST">
					{{csrf_field()}}
						<p>Email: <input type="text" name="email"></p>
						<p>Username: <input type="text" name="username"></p>
						<p>Password: <input type="password" name="password"></p>
						<p>Lastname: <input type="text" name="lastname"></p>
						<p>Firstname: <input type="text" name="firstname"></p>
						<p><button type="submit">Add</button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection