@extends('layouts.app')

@section('title')
	Update Profile
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">
                    <form action="{{ url('/update/user') }}" method="POST">
					{{csrf_field()}}
						<p>Password: <input type="password" name="password"></p>
						<p>Lastname: <input type="text" name="lastname"></p>
						<p>Firstname: <input type="text" name="firstname"></p>
						<p><button type="submit">Update</button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection