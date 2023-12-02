@extends('layouts.admin')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новый товар</h6>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-layout">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Категория: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="category_id">
                                <option label="Выберите категорию"></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Наименование:</label>
                            <input class="form-control" type="text" name="title" placeholder="Наименование"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Страна:</label>
                            <input class="form-control" type="text" name="country" placeholder="Страна"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Бренд:</label>
                            <input class="form-control" type="text" name="brand" placeholder="Бренд"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Аромат:</label>
                            <input class="form-control" type="text" name="aroma" placeholder="Аромат"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Форма выпуска:</label>
                            <input class="form-control" type="text" name="release" placeholder="Форма"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Упаковка:</label>
                            <input class="form-control" type="text" name="pack" placeholder="Упаковка"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Модель:</label>
                            <input class="form-control" type="text" name="model" placeholder="Модель"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Серия:</label>
                            <input class="form-control" type="text" name="series" placeholder="Серия"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Форма:</label>
                            <input class="form-control" type="text" name="forma" placeholder="Форма"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Материал:</label>
                            <input class="form-control" type="text" name="material" placeholder="Материал"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цвет:</label>
                            <input class="form-control" type="text" name="color" placeholder="Цвет"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Назначение:</label>
                            <input class="form-control" type="text" name="purpose" placeholder="Назначение"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Вид стирки:</label>
                            <input class="form-control" type="text" name="washing" placeholder="Вид стирки"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Ручка:</label>
                            <input class="form-control" type="text" name="arm" placeholder="Ручка"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Механизм:</label>
                            <input class="form-control" type="text" name="machine" placeholder="Механизм"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Крепление:</label>
                            <input class="form-control" type="text" name="bracing" placeholder="Крепление"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">МОПы:</label>
                            <input class="form-control" type="text" name="mop" placeholder="МОПы"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Вес:</label>
                            <input class="form-control" type="number" name="weight" placeholder="Вес"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Объем:</label>
                            <input class="form-control" type="number" name="volume" placeholder="Объем"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Количество:</label>
                            <input class="form-control" type="number" name="quantity" placeholder="Количество"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">pH:</label>
                            <input class="form-control" type="number" name="ph" placeholder="pH"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Партия:</label>
                            <input class="form-control" type="number" name="amount" placeholder="Партия"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Цена:</label>
                            <input class="form-control" type="number" name="price" placeholder="Цена"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Плотность:</label>
                            <input class="form-control" type="number" name="density" placeholder="Плотность"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Толщина:</label>
                            <input class="form-control" type="number" name="depth" placeholder="Толщина"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="form-control-label">Анонс:</label>
                            <textarea class="form-control" id="summernote1" name="desc"></textarea><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="form-control-label">Описание:</label>
                            <textarea class="form-control" id="summernote2" name="about"></textarea><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Фото 1:</label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image1" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br><br>
                                <span class="custom-file-control"></span>
                                <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 5rem">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Фото 2:</label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image2" data-placeholder="Выберите фото" onchange="readURL2(this);"><br><br><br>
                                <span class="custom-file-control"></span>
                                <img src="{{ asset('media/product/empty-image.png') }}" id="two" style="width: 5rem">
                            </label>
                        </div>
                    </div>
                </div><br>
                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="news" value="false">
                            <span>Новинка</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="hits" value="false">
                            <span>Хит продаж</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="promo" value="false">
                            <span>Акция</span>
                        </label>
                    </div><!-- col-4 -->
                </div>
                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5">
                        <i class="fa fa-floppy-o"></i>
                    </button>
                    <a href="{{ route('admin.products') }}" class="btn btn-info">К списку товаров</a>
                </div>
            </div>
        </form>

    </div>


    {{--<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}"></script>--}}

    <script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
