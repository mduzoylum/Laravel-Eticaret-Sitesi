@extends('layouts.master')
@section('title','Kategori')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
            <li>Arama Sonucu</li>
        </ol>
        <div class="products bg-content">
            <div class="row">
                @if(count($urunler)==0)
                    <div class="col-md-12 text-center">
                        Bir ürün bulunmadı!
                    </div>
                @endif
                @foreach($urunler as $urun)
                    <div class="col-md-3 product">
                        <a href="{{route('urun',$urun->slug)}}">
                            <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="{{$urun->urun_adi}}">
                        </a>
                        <p>
                            <a href="{{route('urun',$urun->slug)}}">
                                {{$urun->urun_adi}}
                            </a>
                        </p>
                        <p class="price">{{$urun->fiyati}} ₺</p>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {!! $urunler->appends(['aranan'=>old('aranan')])->links() !!}
                {{--todo buraya numaralandırma olarak links yapısı eklenecek--}}
            </div>
        </div>
    </div>
@endsection
