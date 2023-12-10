@extends('layout')

@section('content')

    <style>
        .uper {

            margin-top: 40px;

        }
    </style>

    <div class="card uper">

        <div class="card-header">

            Обновяване на запис за пациент

        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div><br />
            @endif

            <form method="post" action="{{ route('patients.update', $patient->id) }}">

                <div class="form-group">

                    @csrf
                    @method('PATCH')
                    <label for="name">Име:</label>

                    <input type="text" class="form-control" name="name" value="{{ $patient->name }}" />

                </div>

                <div class="form-group">

                    <label for="species">Вид:</label>

                    <input type="text" class="form-control" name="species" value="{{ $patient->species }}" />

                </div>

                <div class="form-group">

                    <label for="color">Цвят:</label>

                    <input type="text" class="form-control" name="color" value="{{ $patient->color }}" />

                </div>
                <div class="form-group">
                    <label for="birthday">Дата на раждане:</label>

                    <input type="date" id="birthday" name="birthday" value="2023-12-02" min="2000-01-01"
                        max="2024-01-01" />
                    {{-- <label for="birthday">Дата на раждане:</label> --}}

                    {{-- <input type="text" class="form-control" name="birthday" value="{{ $patient->birthday }}" /> --}}

                </div>
                <div class="form-group">

                    <label for="gender">Пол:</label>

                    <input type="text" class="form-control" name="gender" value="{{ $patient->gender }}" />

                </div>
                <div class="form-group">

                    <label for="weight">Тегло:</label>

                    <input type="text" class="form-control" name="weight" value="{{ $patient->weight }}" />

                </div>
                <button type="submit" class="btn btn-primary">Обнови данни</button>

            </form>

        </div>

    </div>

@endsection
