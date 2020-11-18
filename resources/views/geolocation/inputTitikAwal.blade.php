@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Input Location</h2></center>
@endsection

@section('konten')

<div class="title_left">
                        <p><b><h3>Input Lokasi Toko </h3></b> <p>
                        </div>


                <div class="x_panel">
                  <div class="x_title">
                    <h2>>> Input Lokasi Toko <<</h2>
                      <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

<br>
<div class="col-lg-12" class="form-inline">
	<div class="block margin-bottom-sm">

<!-- Tampilan untuk mengambil geolocation -->
	<form class="form-horizontal" action="/LocationStore" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
	     <div class="col col-md-3">
	     <label for="email-input" class=" form-control-label">Nama Toko</label></div>
		      <div class="col-12 col-md-9">
		          <input type="text" id="namaToko" name="namaToko" placeholder="Masukkan Nama Toko" class="form-control">
		      </div>
	  </div>

	  <div class="line"></div>
	     <div class="form-group row">
		      <div class="col col-md-3">
			       <label for="text-input" class=" form-control-label">Latitude</label></div>
                  <div class="col-12 col-md-9">
                    <input type="text" id="latitude" name="latitude" placeholder="Masukkan Latitude" class="form-control" readonly="">		
                  </div>
        </div>

	  <div class="line"></div>
	     <div class="form-group row">
	        <div class="col col-md-3">
	  	      <label for="email-input" class=" form-control-label">Longitude</label></div>
		            <div class="col-12 col-md-9">
                  <input type="text" id="longitude" name="longitude" placeholder="Masukkan Longitude" class="form-control" readonly="">		
                </div>
	     </div>

	  <div class="line"></div>
	     <div class="form-group row">
	         <div class="col col-md-3">
	           	<label for="email-input" class=" form-control-label">Accuracy</label></div>
		            <div class="col-12 col-md-9">   
		               <input type="text" id="accuracy" name="accuracy" placeholder="Masukkan Accuracy" class="form-control" readonly="">
		            </div>
         </div>

	  <div class="line"></div>
	   <center><br><br>
        <button type="button" class="btn btn-warning" onclick="getLocation()">Geolocation</button> 
            <input type="submit" value="Submit" class="btn btn-primary"></center>
	</form>
    
</div>
</div>
</div>


<script>
var lat = document.getElementById("latitude");
var long = document.getElementById("longitude");
var acc = document.getElementById("accuracy");

function getLocation() {
    if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
    } 
    else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
    
function showPosition(position) {
    lat.value=position.coords.latitude;
    long.value=position.coords.longitude;
    acc.value=position.coords.accuracy;
}
</script>

@endsection

