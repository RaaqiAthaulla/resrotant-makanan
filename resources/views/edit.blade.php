@extends('main')
@section('container')
  <link rel="stylesheet" href="../css/add.css">
<body>
    @foreach($makanans as $makanan)@endforeach
  <div class="wrapper">
    <form class="form" action="{{ url('makanans',$makanan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
      @method("PUT")
      <div class="pageTitle title">CARBOREA Café </div>
      <div class="secondaryTitle title">Masukkan Menu</div>
      <input type="text" value="{{ $makanan->nama }}" class="harga formEntry" placeholder="Nama Makanan" name="nama"/>
      <input type="text" value="{{ $makanan->harga }}" class="harga formEntry" placeholder="Harga" name="harga"/>
      <label class="secondaryTitle title">Choose File<br>
        <input class="form-control form-field animation 3" type="file" id="image" name="image"  " >
      </label><br><br>
      <button class="submit formEntry" type="submit">Submit</button>
    </form>
  </div>
</body>
    
@endsection
{{-- @foreach($hotels as $hotel)@endforeach
<div class="container">
  <div class="left">
    <div class="header">
  <form action="{{ url('hotels',$hotel->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")
  
     <h1> Hotel</h1>
    </div>

    <div class="form">
        <input type="text" value="{{ $hotel->name }}" placeholder="Hotel Name" name="name"/>
        <h4>Cover</h4>
        <label class="custom-file-upload">Choose FIle
              <input class="form-control" type="file" id="image" name="image"  " >
        </label><br><br>
  
        <input type="text" placeholder="Location" value="{{ $hotel->location }}"  name="location"/>
        <input type="text" placeholder="Price" value="{{ $hotel->price }}"  name="price"/>

        <label for="">Shower</label>
        <input type="checkbox" value="Kingbed" placeholder="Price" name="facilate"/>
        <label for="">Wifi</label>
        <input type="checkbox" value="Bathup" placeholder="Price" name="facilate"/>
        <input type="text" placeholder="Price" value="{{ $hotel->synopsis }}"  name="synopsis"/>
        <button class="animation a6" type="submit">submit</button>
    </div>
  </div>  
        
</div>  
  </form>
</div> --}}