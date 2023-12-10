@extends('layout')

@section('content')

    <style>
        .uper {

            margin-top: 40px;

        }
    </style>

    <div class="card uper">

        <div class="card-header">

            Нов запис на пациент

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

            <form method="post" action="{{ route('patients.store') }}">

                <div class="form-group">

                    @csrf

                    <label for="name">Име:</label>

                    <input type="text" class="form-control" name="name" />

                </div>

                <div class="form-group">

                    <label for="species">Вид:</label>

                    <input type="text" class="form-control" name="species" />

                </div>

                <div class="form-group">

                    <label for="color">Цвят:</label>

                    <input type="text" class="form-control" name="color" />

                </div>
                <div class="form-group">
                    <label for="birthday">Дата на раждане:</label>

                    <input type="date" id="birthday" name="birthday" min="2000-01-01" max="2024-01-01" />

                    {{-- <label for="birthday">Дата на раждане:</label>

                    <input type="text" class="form-control" name="birthday" /> --}}

                </div>
                <div class="form-group">

                    <label for="gender">Пол:</label>

                    <input type="text" class="form-control" name="gender" />

                </div>
                <div class="form-group">

                    <label for="weight">Тегло:</label>

                    <input type="text" class="form-control" name="weight" />

                </div>
                <button type="submit" class="btn btn-primary">Добави пациент</button>

            </form>

        </div>

    </div>

@endsection
