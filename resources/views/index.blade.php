@extends('layout')

@section('content')
    <style>
        .uper {

            margin-top: 40px;

        }
    </style>

    <div class="uper">

        @if (session()->get('success'))
            <div class="alert alert-success">

                {{ session()->get('success') }}

            </div><br />
        @endif
        @if (session()->get('error'))
            <div class="alert alert-danger">

                {{ session()->get('error') }}

            </div><br />
        @endif
        <a href="{{ route('patients.create') }}" class="btn btn-success">Нов запис</a>
        <div class="float-end">

            {{ Auth::user()->name }}

            <a href="{{ route('logout') }}" class="btn btn-dark"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                {{ __('Logout') }}

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                @csrf

            </form>

        </div>
        <table class="table table-striped">

            <thead>

                <tr>

                    <td>Име</td>
                    <td>Вид</td>

                    <td>Цвят</td>
                    <td>Дата на раждане</td>
                    <td>Пол</td>
                    <td>Тегло</td>
                    <td colspan="2"></td>

                </tr>

            </thead>

            <tbody>

                @foreach ($patients as $patient)
                    <tr>



                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->species }}</td>

                        <td>{{ $patient->color }}</td>
                        <td>{{ $patient->birthday }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->weight }}</td>
                        <td>
                            @if (Auth::user()->isAdmin == 1)
                                <a href="{{ route('patients.edit', $patient->id) }}"
                                    class="btn btn-primary">Редактиране</a>
                            @endif
                        </td>

                        <td>
                            @if (Auth::user()->isAdmin == 1)
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="post"
                                    onsubmit="return confirm('Пациентът ще бъде изтрит. Сигурни ли сте, че искате да продължите?');">

                                    @csrf

                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">Изтрий</button>

                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $patients->links() }}
        <div>
        @endsection
