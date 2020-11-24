@extends('layouts.app')

@section('title', 'Lista Heróis')

@push('scripts')
    <script>
        function clicaExcluir(id) {
            document.getElementById('id').value = id;
            form.submit();
        }

        $(document).ready(function () {

        });
    </script>
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4">Lista Heróis</h1>

    <div class="card p-2">
        <h4 class="card-title">Buscar</h4>
        <h4 class="card-body">
            <form name='form' method="POST" action="{{ url('herois') }}">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <label for="nome">Nome:</label>
                    </div>
                    <div class="col-sm">
                        <input name="nome" id="nome" class="form-control" placeholder="nome do herói"/>
                        <input name="id" id="id" type="hidden"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <button class="btn btn-primary btn-block">Buscar</button>
                    </div>
                </div>
            </form>
        </h4>
    </div>

    <div>
        <p class="text-right">
            <a href="{{ url('/herois/save') }}"><i class="fas fa-plus-square mr-1"></i>Novo</a>
            {{-- <button class="btn btn-primary">Novo</button> --}}
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Excluir</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($herois as $heroi)
                    <tr>
                        <td>
                            <a href="#" onclick="clicaExcluir({{$heroi->id}})"><i class="fas fa-trash-alt"></i>  Excluir</a>
                            <a href="{{ url('/herois/save?id='.$heroi->id) }}"><i class="fas fa-edit"></i>  Editar</a>
                        </td>
                        <td>
                            <a href="{{ url('/herois/save?id='.$heroi->id) }}">{{ $heroi->nome }}</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">
                            <p>Os meus heróis morreram de overdose.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
