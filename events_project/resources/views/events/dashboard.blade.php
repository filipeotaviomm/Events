@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Participante(s)</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $index => $event) {{-- esse $index ñ está sendo usado, mas poderia ser --}}
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td scope="row">
                    <a href="/event/{{ $event->id }}">{{ $event->title }}</a>
                </td>
                <td scope="row">{{ date('d/m/Y', strtotime($event->date)) }}</td>
                <td scope="row">{{ count($event->users) }}</td>
                <td scope="row">
                    <a href="/event/edit/{{ $event->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/event/{{ $event->id }}" method="POST"> {{-- a tag form só aceita os métodos get e post, por isso não pode colocar delete --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Participante(s)</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsAsParticipant as $index => $event)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td scope="row">
                    <a href="/event/{{ $event->id }}">{{ $event->title }}</a>
                </td>
                <td scope="row">{{ date('d/m/Y', strtotime($event->date)) }}</td>
                <td scope="row">{{ count($event->users) }}</td>
                <td scope="row">
                    <form action="/event/leave/{{ $event->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Sair do Evento
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não está participando de nenhum evento,
        <a href="/">veja todos os eventos</a>
    </p>
    @endif
</div>

@endsection