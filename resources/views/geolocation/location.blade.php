@extends('tampilan/index')
@section('konten')
                <div class="title_left">
                           <p><b><h3>Data Lokasi Toko</h3></b> <p>
                        </div>
                        <div class="x_panel">
                                <div class="x_title">
                                    <h2>>>Data Lokasi Toko<<</h2>
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
                    <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">BARCODE</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 127px;">NAMA TOKO</th>

                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">LATITUDE</th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">LONGTITUDE </th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ACCURACY</th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ACTION </th>
                          
                        </tr>
                      </thead>
                     


		  <tbody>@foreach ($lokasi_toko as $lok)
		  <tr  role="row" class="odd" align="center">
			  <td  class="sorting_1"> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                    $lok->barcode, 'C128')}}" height="60" width="180">
                    <br>{{$lok->barcode }}</td>
			  <td  class="sorting_1">{{$lok->nama_toko }}</td>
			  <td  class="sorting_1">{{$lok->latitude }}</td>
			  <td  class="sorting_1">{{$lok->longitude }}</td>
			  <td  class="sorting_1">{{$lok->accuracy }}</td>
			   <td  class="sorting_1">
                      <center>
                      <a href="cetakBarcode_id/{{ $lok->barcode }}" class="btn btn-primary"><i class="fa fa-print">Cetak</i></a></center>
                    </td>

		  </tr>
      @endforeach
	
 </tbody>
              </table>

            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <center>
        
  <!-- /page content -->
  <a href="cetakBarcode"><button type="button" class="btn btn-success" ><i class="fa fa-print">Cetak Barcode</i></button></a> 
         </center>
  </div>
</div>

 
    
     


@endsection

