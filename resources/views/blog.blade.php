@extends('layouts.app')
@section('content')

<div class="pt-6 pb-12">
  <h1 class="font-bold text-4xl text-center	">Nachrichten</h1>
  @foreach($mydata as $match)
  <div id="card" class="">
    <div class="container w-100 lg:w-3/5 mx-auto flex flex-col">
      <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
        <div class="h-64 w-auto md:w-1/2">
          <img class="inset-0 h-full w-full object-cover object-center" src="{{$match['img']}}" />
        </div>
        <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
          <h3 class="text-sm">{{$match['date']}}</h3>
          <h3 class="font-semibold text-xl"><a href="{{$match['url']}}" target="_blank">{{$match['title']}}</a></h3>
          <p class="text-justify	">{{$match['extrac']}}</p>
          <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
            <a href="{{$match['url']}}" target="_blank" class="bg-gray-800 hover:bg-gray-900 text-white py-2 px-4 rounded">Weiterlesen</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection