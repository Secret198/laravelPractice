@extends('layout')

@section('content')

    <h1>AI eszközök
        <a href="{{route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc'])}}" title="ABCk">Le</a>
        <a href="{{route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc'])}}" title="ZYX">Fel</a>
    </h1>

    @if(session("success"))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <ul>
        @foreach($aitools as $aitool)
            <li class="actions">
                {{$aitool->name}}
                <a href="{{route('aitools.edit', $aitool->id)}}" class="button">Szerkesztés</a>
                <a href="{{route('aitools.show', $aitool->id)}}" class="button">Megjelenítés</a>
                <form action="{{route('aitools.destroy', $aitool->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submint" onclick="return confirm('Biztos törölni szeretné')">Törlés</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{$aitools->appends(['sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir')])->links()}}
@endsection