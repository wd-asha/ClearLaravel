@extends('layouts.admin')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Товары</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего: {{ $products->total() }}
            <span style="float: right">
                <a href="{{ route('product.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i></a>
            </span>
        </p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        {{-- Filtration --}}
        <div class="filerForms" style="display: flex; justify-content: flex-start; align-items: flex-start;">
            {{-- Categories filter --}}
            <form action="{{route('admin.equipmentsS')}}" method="get" class="mr-4">
                @csrf
                <select name="category_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="Все категории" selected></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(isset($_GET['category_id']))
                                @if($_GET['category_id'] == $category->id) selected @endif
                            @endif>{{$category->title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-info" style="transform: translate(-.25rem, -.1rem);">
                    <i class="fa fa-filter"></i>
                </button>
            </form>
            {{-- end subcategories filer --}}
            {{-- Firms filter --}}
            {{--<form action="{{route('admin.equipmentsF')}}" method="get" class="mr-4">
                @csrf
                <select name="firma_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="All firms" selected></option>
                    @foreach($firmas as $firma)
                        <option value="{{$firma->id}}"
                                @if(isset($_GET['firma_id']))
                                @if($_GET['firma_id'] == $firma->id) selected @endif
                            @endif>{{$firma->title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-info" style="transform: translateX(-.25rem);">Apply</button>
            </form>--}}
            {{-- end firms filter --}}
            {{-- Amount filter --}}
            <form action="{{route('admin.equipmentsA')}}" method="get" class="mr-4">
                @csrf
                <input type="number" name="amount" placeholder="Кол-во" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem; width: 6rem;">
                <button type="submit" class="btn btn-outline-info" style="transform: translate(-.25rem, -.1rem);">
                    <i class="fa fa-filter"></i>
                </button>
            </form>
            {{-- end amount filter --}}
        </div>
        {{-- end filtration --}}

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Вес, гр.</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Статус</th>
                    <th>Кол-во, шт.</th>
                    <th>Дата создания</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="../../../../{{ $product->image1}}" alt="" style="width: 100px;"></td>
                        <td>
                            <a href="{{ route('product', $product->id) }}" target="_blank">{{ $product->title }}</a>
                        </td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <div class="togglebutton">
                                <label>
                                    @if($product->status)
                                        <a href="{{route('product.status0', $product->id)}}">
                                            <input type="checkbox" checked="">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                    @if(!$product->status)
                                        <a href="{{route('product.status1', $product->id)}}">
                                            <input type="checkbox">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td>
                            {{--@if($product->amount >= 5)
                                <span style="color: green; font-size: 1rem; font-weight: 600">{{ $product->amount }}</span>
                            @endif
                            @if($product->amount < 5 && $product->amount > 3)
                                <span style="color: #cc7a00; font-size: 1rem; font-weight: 600">{{ $product->amount }}</span>
                            @endif
                            @if($product->amount <= 3)
                                <span style="color: red; font-size: 1rem; font-weight: 600">{{ $product->amount }}</span>
                            @endif--}}
                            @if($product->amount < 3)
                                <span style="color: red; font-size: 1rem">{{ $product->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $product->id }}" class="btn btn-warning" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-edit" style="font-size: .66rem;"></i>
                                </a>
                            @else
                                <span style="font-size: 1rem">{{ $product->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $product->id }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-edit" style="font-size: .66rem;"></i>
                                </a>
                            @endif
                        </td>
                        <td>{{ $product->created_at->diffForHumans() }}</td>
                        <td>
                            {{--<a href="{{ route('product.show', [$product->id, $product->category_id]) }}" class="btn btn-info" style="display: inline-block; margin-right: .5rem;" target="_blank">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>--}}
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('product.delete', $product->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>

                    <div id="modaldemo{{ $product->id }}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Количество</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('amount.product', $product->id) }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group @error('title') is-invalid @enderror">
                                            <input type="number" name="amount" class="form-control" placeholder="Количество" value="{{ $product->amount }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-block">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
                @if($products->total() == 0)
                    <tr>
                        <td><p style="text-align: center; width: 100%">нет данных</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Products--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Удаленные товары: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Вес, гр.</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Дата удаления</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td><img src="../../../../{{ $trash->image1}}" alt="" style="width: 100px;"></td>
                        <td>{{ $trash->title }}</td>
                        <td>{{ $trash->category->title }}</td>
                        <td>{{ $trash->weight }}</td>
                        <td>{{ $trash->price }}</td>
                        <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('product.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('product.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($trashed->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashed->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

    </div>

@endsection
