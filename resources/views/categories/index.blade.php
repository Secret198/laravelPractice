@extends("layout")

@section("content")
<h1>Kategóriák</h1>

@if(session("success"))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<ul>
    @foreach($categories as $category)
        <li>
            {{$category->id}} - {{$category->name}}
            <a href="{{route('categories.edit', $category->id)}}">Szerkesztés</a>
            <a href="{{route('categories.show', $category->id)}}">Megjelenítés</a>
        </li>
    
    @endforeach
</ul>

@endsection