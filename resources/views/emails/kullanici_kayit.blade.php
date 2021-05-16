<img src="https://pngimg.com/uploads/welcome/welcome_PNG78.png" width="250" alt="">
<h1>{{ config('app.name') }}</h1>
<p>Merhaba {{$kullanici->adsoyad}} , Kaydınız başarılı bir şekilde yapıldı.</p>
<p>Kaydınızı aktifleştirmek için <a href="{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}">
        tıklayın</a> veya aşağıdaki bağlantıyı tarayınızda açın </p>
<p>{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}</p>
