@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>
                            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control" placeholder="Фамилия">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Имя">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="patronymic" value="{{ $user->patronymic }}" class="form-control" placeholder="Отчество">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="age" value="{{ $user->age }}" class="form-control" placeholder="Возраст">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Адрес">
                        </label>
                    </div>
                    <div class="form-group">
                        <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
                            <option disabled selected>Пол</option>
                            <option {{  $user->gender == 1 ? ' selected' : '' }} value="1">Мужской</option>
                            <option {{ $user->gender == 2 ? ' selected' : '' }} value="2">Женский</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
