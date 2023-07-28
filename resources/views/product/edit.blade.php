@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>
                            <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="Название">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ $product->description }}" name="description" class="form-control" placeholder="Описание">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ $product->content }}</textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control" placeholder="Цена">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" value="{{ $product->count }}" name="count" class="form-control" placeholder="Количество">
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option {{ in_array($color->id, $productColorIds) ? 'selected' : '' }} value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
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
