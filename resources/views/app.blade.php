@extends('header')

@section("content")
<section class="flex gap-[2rem] flex-col sm:flex-row w-full">
  <div class="w-full m-w-md">
    <form action="/create" method="post" class="flex flex-col gap-3 ">
      @csrf
      <label for="todo">Get stuff done today!</label>
      <input type="text" name="todo" id="todo" placeholder="Your todo right here" class="w-full rounded border p-2">
      <button type="submit" class="bg-green-500 p-2 rounded">Save</button>
    </form>
  </div>
  <div class=" w-full m-w-md">
    <h3 class="font-bold text-lg mb-2">Your todos will appear right hear!</h3>
    <div class="flex gap-4 flex-col">
      @if (count($data) > 0 )
      @foreach ($data as $todo)
      <div class="flex w-full justify-between items-center gap-3 border border-slate-700 p-2 rounded">
        <p>{{ $todo['todo'] }}</p>
        <div class="flex gap-4">
          <a type="submit" class="bg-red-500 p-2 border rounded" href="/edit/{{ $todo['id']}}">Edit</a>
          <form action="/del" method="POST">
            @method('delete')
            @csrf
            <input name="id" value="{{ $todo['id'] }}" hidden />
            <button type="submit" class="bg-red-500 p-2 border rounded">Delete</button>
          </form>
        </div>
      </div>
      @endforeach
      @else
      <p>No todos!</p>
      @endif
    </div>
  </div>
  </div>
</section>
@endsection("content")