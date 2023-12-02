@extends('layouts.admin')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Редактирование товара (ID {{ $product->id }})</h6>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Категория: </label>
                            <select class="form-control select2" name="category_id">
                                <option value="{{$product->category_id}}">{{ $product->category->title }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Наименование:</label>
                            <input class="form-control" type="text" name="title" placeholder="Наименование" value="{{$product->title}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Страна:</label>
                            <input class="form-control" type="text" name="country" placeholder="Страна" value="{{$product->country}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Бренд:</label>
                            <input class="form-control" type="text" name="brand" placeholder="Бренд" value="{{$product->brand}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Аромат:</label>
                            <input class="form-control" type="text" name="aroma" placeholder="Аромат" value="{{$product->aroma}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Форма выпуска:</label>
                            <input class="form-control" type="text" name="release" placeholder="Форма" value="{{$product->release}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Упаковка:</label>
                            <input class="form-control" type="text" name="pack" placeholder="Упаковка" value="{{$product->pack}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Модель:</label>
                            <input class="form-control" type="text" name="model" placeholder="Модель" value="{{$product->model}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Серия:</label>
                            <input class="form-control" type="text" name="series" placeholder="Серия" value="{{$product->series}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Форма:</label>
                            <input class="form-control" type="text" name="forma" placeholder="Форма" value="{{$product->forma}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Материал:</label>
                            <input class="form-control" type="text" name="material" placeholder="Материал" value="{{$product->material}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цвет:</label>
                            <input class="form-control" type="text" name="color" placeholder="Цвет" value="{{$product->color}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Назначение:</label>
                            <input class="form-control" type="text" name="purpose" placeholder="Назначение" value="{{$product->purpose}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Вид стирки:</label>
                            <input class="form-control" type="text" name="washing" placeholder="Вид стирки" value="{{$product->washing}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Ручка:</label>
                            <input class="form-control" type="text" name="arm" placeholder="Ручка" value="{{$product->arm}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Механизм:</label>
                            <input class="form-control" type="text" name="machine" placeholder="Механизм" value="{{$product->machine}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Крепление:</label>
                            <input class="form-control" type="text" name="bracing" placeholder="Крепление" value="{{$product->bracing}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">МОПы:</label>
                            <input class="form-control" type="text" name="mop" placeholder="МОПы" value="{{$product->mop}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Вес:</label>
                            <input class="form-control" type="number" name="weight" placeholder="Вес" value="{{$product->weight}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Объем:</label>
                            <input class="form-control" type="number" name="volume" placeholder="Объем" value="{{$product->volume}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Количество:</label>
                            <input class="form-control" type="number" name="quantity" placeholder="Количество" value="{{$product->quantity}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">pH:</label>
                            <input class="form-control" type="number" name="ph" placeholder="pH" value="{{$product->ph}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Партия:</label>
                            <input class="form-control" type="number" name="amount" placeholder="Партия" value="{{$product->amount}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Цена:</label>
                            <input class="form-control" type="number" name="price" placeholder="Цена" value="{{$product->price}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Плотность:</label>
                            <input class="form-control" type="number" name="density" placeholder="Плотность" value="{{$product->density}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Толщина:</label>
                            <input class="form-control" type="number" name="depth" placeholder="Толщина" value="{{$product->depth}}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="form-control-label">Анонс:</label>
                            <textarea class="form-control" id="summernote1" name="desc">{{ $product->desc }}</textarea><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="form-control-label">Описание:</label>
                            <textarea class="form-control" id="summernote2" name="about">{{ $product->about }}</textarea><br>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="news" value="false"
                                    @php if($product->news == 1) {echo "checked";} @endphp>
                            <span>Новинка</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="hits" value="false"
                                    @php if($product->hits == 1) {echo "checked";} @endphp>
                            <span>Хит продаж</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="promo" value="false"
                                    @php if($product->promo == 1) {echo "checked";} @endphp>
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
        <hr>

        <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
            <h6 class="card-body-title">Изменение фото товара</h6><br>

            <form action="{{ route('admin.product.updatePhoto', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Фото 1:</label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file1" name="image1" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image1" value="{{ $product->image1 }}">
                            </label>
                        </div>
                        <img src="/{{ $product->image1 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>

                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Фото 2:</label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file2" name="image2" data-placeholder="Выберите фото" onchange="readURL2(this);"><br><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image2" value="{{ $product->image2 }}">
                            </label>
                        </div>
                        <img src="/{{ $product->image2 }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="two" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div><br>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5">
                        <i class="fa fa-floppy-o"></i>
                    </button>
                    <a href="{{ route('admin.products') }}" class="btn btn-info">К списку товаров</a>
                </div>
            </form>
        </div>


    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

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
    </script>
    <script type="text/javascript">
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
