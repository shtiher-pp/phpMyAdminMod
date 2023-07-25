@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создать продукт</h1>
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
                <form action="{{ route('product.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Название">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('description') }}" name="description" class="form-control" placeholder="Описание">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент"></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('preview_image') }}" name="preview_image" class="form-control" placeholder="Изображение">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('price') }}" name="price" class="form-control" placeholder="Цена">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('count') }}" name="count" class="form-control" placeholder="Количество">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ old('is_published') }}" name="is_published" class="form-control" placeholder="Опубликовано">
                        </label>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>--}}
{{--                            <input type="text" name="address" class="form-control" placeholder="Адрес">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <select name="gender" class="custom-select form-control" id="exampleSelectBorder">--}}
{{--                            <option disabled selected>Пол</option>--}}
{{--                            <option {{ old('gender') == 1 ? ' selected' : '' }} value="1">Мужской</option>--}}
{{--                            <option {{ old('gender') == 2 ? ' selected' : '' }} value="2">Женский</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
