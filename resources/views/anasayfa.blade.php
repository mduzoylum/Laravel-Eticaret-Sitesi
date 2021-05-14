@extends('layouts.master')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($kategoriler as $kategori)
                            <a href="{{ route('kategori',$kategori->slug) }}" class="list-group-item"><i
                                    class="fa fa-arrow-circle-o-right"></i> {{$kategori->kategori_adi}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($urunler_slider);$i++)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                                class="{{$i==0 ? 'active' : ''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($urunler_slider as $index => $urun_detay)
                            <div class="item {{$index==0 ? 'active' : ''}}">
                                <img src="https://via.placeholder.com/640x400.png?text=Resim 1" alt="...">
                                <div class="carousel-caption">
                                    {{$urun_detay->urun->urun_adi}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="#">
                            <img src="https://via.placeholder.com/400x485.png?text=Günün Fırsatı"
                                 class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 1"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 2"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 3"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 4"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 1"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 2"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 3"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 4"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 1"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 2"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 3"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="https://via.placeholder.com/640x400.png?text=Urun 4"></a>
                            <p><a href="#">Ürün adı</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
