@extends('header')
@section("content")
	<div class="flex flex-col items-center">
		<form class="w-full flex flex-col gap-3 max-w-md mb-2" action="login" method="post">
			@csrf
			@method("POST")
			<input class="p-3 rounded-lg" type="email" name="email" value="{{ (old('email')) ?  old('email') : ""}}" placeholder="jog@gmail.com">
			<input class="p-3 rounded-lg" type="text" name="password" value="{{ (old('password')) ?  old('password') : ""}}" placeholder="Password">
			<button class="bg-purple-300 p-3 uppercase font-bold">Login</button>
				<p class="text-red-500 text-center">{{$errors->first()}}</p>
		</form>
		<p>Don't have an account ?</p>
		<a href="/register" class="text-blue-500">Register</a>
	</div>

@endsection