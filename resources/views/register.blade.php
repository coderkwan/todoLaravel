@extends('header')
@section("content")
	<div class="flex flex-col items-center">
		<form class="w-full flex flex-col gap-3 max-w-md mb-2" action="register" method="post">
		@csrf
		@method("POST")
			<input class="p-3 rounded-lg" type="text" name="name" value="{{ (old('name')) ?  old('name') : ""}}" placeholder="Name">
			<input class="p-3 rounded-lg" type="email" name="email" value="{{ (old('email')) ?  old('email') : ""}}" placeholder="john@gmail.com">
			<input class="p-3 rounded-lg" type="text" name="password" value="{{ (old('password')) ?  old('password') : ""}}" placeholder="Password">
			<button class="bg-purple-300 p-3 uppercase font-bold">Register</button>
			<p class="text-red-500 text-center">{{$errors->first()}}</p>
		</form>
		<p>Already have an account?</p>
		<a href="/login" class="text-blue-500">Login</a>
	</div>

@endsection