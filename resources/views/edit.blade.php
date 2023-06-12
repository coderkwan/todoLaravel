@extends('header')
@section("content")
<div class="w-full md:w-1/2">
	<button class="py-1 px-4 border border-black text-slate-900 rounded mb-4" onclick="(()=>{ window.history.back();})()">Back</button>
	<form action="/update" method="post" class="m-w-md mb-3 flex flex-col gap-3 ">
		@method("PUT")
		@csrf
		<label for="todo" class="font-bold">Edit your todo!</label>
		<input type="text" name="todo" id="todo" value="{{ $todo[0]['todo'] }}" placeholder="Your todo right here" class="w-full rounded border p-2">
		<input name="id" value="{{ $todo[0]['id'] }}" hidden />
		<button type="submit" class="bg-green-500 p-2 rounded">Save</button>
	</form>
	<form action="/del" method="POST" >
		@method('delete')
		@csrf
		<input name="id" value="{{ $todo[0]['id'] }}" hidden />
		<button type="submit" class="bg-red-500 p-2 border w-full rounded">Delete</button>
	</form>
</div>
@endsection