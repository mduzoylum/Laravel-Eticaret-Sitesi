@extends('layouts.master')
@section('title','Sepet')
@section('content')
    @include('layouts.partials.alert')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            {{--                                {{dd(Cart::content())}}--}}
            @if(count(Cart::content())>0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Adet Fiyatı</th>
                        <th>Adet</th>
                        <th>Tutar</th>
                    </tr>

                    @foreach(Cart::content() as $urunCartItem)
                        <tr>
                            <td style="width:120px"><img src="http://via.placeholder.com/120x120?text=UrunResmi"></td>
                            <td>
                                <a href="{{route('urun',$urunCartItem->options->slug)}}">
                                    {{$urunCartItem->name}}
                                </a>
                                <form action="{{route('sepet.kaldir',$urunCartItem->rowId)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                                </form>
                            </td>
                            <td>{{$urunCartItem->price}} ₺</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-default urun-adet-azalt"
                                   data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty-1}}">-</a>
                                <span style="padding: 10px 20px">{{$urunCartItem->qty}}</span>
                                <a href="#" class="btn btn-xs btn-default urun-adet-artir"
                                   data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty+1}}">+</a>
                            </td>
                            <td>{{$urunCartItem->subtotal}} ₺</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Alt Toplam</th>
                        <th>{{ Cart::subtotal() }} ₺</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">KDV</th>
                        <th>{{ Cart::tax() }} ₺</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Genel Toplam</th>
                        <th>{{ Cart::total() }} ₺</th>
                        <th></th>
                    </tr>
                </table>

                <form action="{{route('sepet.bosalt')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
                </form>
                <div>
                    <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                </div>
            @else
                <div class="text-center">
                    <p class="alert alert-danger">Sepette Ürün Bulunmamaktadır</p>
                    <a href="/" class="btn btn-theme">Alışverişe Başla</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            $('.urun-adet-artir,.urun-adet-azalt').on('click', function () {
                var id = $(this).attr('data-id');
                var adet = $(this).attr('data-adet');
                $.ajax({
                    type: 'PATCH',
                    url: '{{url('sepet/guncelle')}}/' + id,
                    data: {adet: adet},
                    success: function (result) {
                        window.location.href = '/sepet';
                    }
                });
            });
        });
    </script>
@endsection
