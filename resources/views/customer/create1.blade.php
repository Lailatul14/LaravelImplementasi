@extends('tampilan/index')
@section('konten')

<div class="title_left">
                           <p><b><h3>Add Customer 1</h3></b> <p>
                        </div>
                        <div class="x_panel">
                                <div class="x_title">
                                    <h2>>>Input Data Customer<<</h2>
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
                                
                                       
                         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:500px; margin-left:50px;">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Ambil Foto</h3>
            <button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="kamera"></div>
            <div id="results" style="float:right; margin-top:-148px; margin-right:50px;"></div>
            <button id="btn_kamera" type="button" onclick="take_snapshot()" class="btn btn-primary"><i class="fa fa-camera fa-lg"></i></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="save" class="btn btn-primary simpan-foto" data-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>               
                         <div class="card-body card-block">
                        <form action="customerStore1" class="form-horizontal form-label-left" methode="POST" >
                          {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Customer<span class="required">*</span></label></div>
                                <div class="col-10 col-md-9"><input type="text" required="required" id="nama" name="nama" placeholder="Masukkan Nama" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Alamat<span class="required">*</span></label></div>
                                <div class="col-12 col-md-9"><input type="text" required="required" id="alamat" name="alamat" placeholder="Masukkan Alamat" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select"  class=" form-control-label">Provinsi<span class="required">*</span></label></div>
                                <div class="col-12 col-md-9">
                                    <select name="provinsi" class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $key => $value)
                                            <option value="{{ $key }}"required="required">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Kota<span class="required">*</span></label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kota" class="form-control" required="required">
                                        <option >Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Kecamatan</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kecamatan" class="form-control" required="required">
                                        <option >Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Kode Pos - Kelurahan<span class="required">*</span></label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kelurahan" class="form-control" required="required">
                                        <option >Pilih Kode Pos - Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                       
              <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">foto<span class="required">*</span></label></div>
                     <div class="card-body">
                
                <div id="wrap">
                  <img src="" id="img" name="img" required="required">
                  <input id="foto" name="foto" type="hidden" value="" required="required">
                </div>
                <button type="button" onclick="btn_ambilFoto()" style="margin-top:10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ambil Foto</button>
            
                  <button id="submit" value="SimpanData" style="margin-top:10px;"  type="submit" class="btn btn-success">Submit</button>
              </div>
              </div>
            </form>

                                            
                    </div>
                  </div>
                </div>

<style>
  #kamera{
    width: 150px;
    height: 150px;
    border: 1px solid #ccc;
    margin-left: 50px;
  }

  #wrap{
    width: 150px;
    height: 150px;
    border: 1px solid #ccc;
  }

  #btn_kamera{
    margin-top: 10px;
    margin-left: 105px;
  }
</style>

<!--<script src="{{ asset('template/gentela/src/js/webcam.js') }}"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->
<script>
    jQuery('select[name="provinsi"]').on('change',function(){
      var provinsiID = jQuery(this).val();
      if(provinsiID)
      {
        jQuery.ajax({
          url : 'customerCreate1/getstates' +provinsiID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kota"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kota"]').empty();
      }
    });
</script>

<script>
    jQuery('select[name="kota"]').on('change',function(){
      var kotaID = jQuery(this).val();
      if(kotaID)
      {
        jQuery.ajax({
          url : 'customerCreate1/kecamatan' +kotaID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kecamatan"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kecamatan"]').empty();
      }
    });
</script>

<script>
    jQuery('select[name="kecamatan"]').on('change',function(){
      var kecamatanID = jQuery(this).val();
      if(kecamatanID)
      {
        jQuery.ajax({
          url : 'customerCreate1/kelurahan' +kecamatanID,
          type : "GET",
          dataType : "json",
          success:function(data)
          {
            console.log(data);
            jQuery('select[name="kelurahan"]').empty();
            jQuery.each(data, function(key, value){
              $('select[name="kelurahan"]').append('<option value="'+ value.ID_KELURAHAN +'">'+ value.KODEPOS + ' - ' + value.NAMA_KELURAHAN +'</option>');
            });
          }
        });
      }
      else
      {
        $('select[name="kelurahan"]').empty();
      }
    });
</script>

<script>
  Webcam.set({
    width: 150,
    height: 150,
    image_format: 'jpeg',
    jpeg_quality: 90
  })

  function btn_ambilFoto(){
    Webcam.attach("#kamera")
  } 
    
  function take_snapshot(){
    Webcam.snap(function (data_uri){
      document.getElementById('results').innerHTML =
      '<img id="hasil" src="'+data_uri+'"/>';
    });

    var hasil = $('#hasil').attr('src');
    $('#save').click(function(){
      $('#img').attr('src', hasil);
      $('#foto').val(hasil);
    });
  }
</script>


                            
                            
                            @endsection