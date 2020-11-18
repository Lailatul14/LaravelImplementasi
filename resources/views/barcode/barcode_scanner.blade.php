@extends('tampilan/index')
@section('konten')



<div class="title_left">
                           <p><b><h3>Barcode Scanner </h3></b> <p>
                        </div>


                <div class="x_panel">
                  <div class="x_title">
                    <h2>>>Barcode Scanner<<</h2>
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
                  <center>

                <!-- tampilan untuk scan barcode-->
                <div class="card">
                    <div class="card-body">
                        <div>                            
                          <a class="btn btn-warning btn-pulse" id="startButton">Start</a>
                          <a class="btn btn-danger btn-pulse" id="resetButton">Reset</a>
                        </div>
                        <br>

                        <div>
                          <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                        </div>

                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select id="sourceSelect" style="max-width:400px"></select>
                        </div> 
                        <br>

                        <div class="col-lg-12">
                          <label for="inlineFormInput" class="col-sm-form-control-label">Result :</label>
                          <div class="alert alert-secondary" role="alert" id="result" name="barcode"></div>
                        </div> 
                    </div>
                </div>
              </div>


</center>

<!-- Script Zxing untuk scan barcode-->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">
    var a;
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text;
                a = document.getElementById('result').textContent = result.text;
                data_barcode();
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err

              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })


function data_barcode(){    
   console.log('masuk data_barcode');
    // var hasil= document.getElementById('result').value;
      console.log('tampil variable hasil');
      console.log(a);
          jQuery.ajax({
          url : '/barang/alert/' +a,
          type : "GET",
          dataType : "json",
          success:function(data)

              {
             console.log(data);
               jQuery.each(data, function(key,value){
                alert(value.ID_Barang);
                });         
             }
          });
}
  </script>
  
@endsection