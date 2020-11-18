@extends('tampilan/index')
@section('konten')
<!-- Prism -->

<div class="title_left">
                           <p><b><h3>Data Barang </h3></b> <p>
                        </div>


                <div class="x_panel">
                  <div class="x_title">
                    <h2>>>Data Barang<<</h2>
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

                   
                    
                      <form class="form-horizontal" action="barcodeStore" methode="post" enctype="multipart/form-data">
                        
  {{ @csrf_field() }}
  <div class="form-group row">
    <div class="col col-md-1"></div>
    <div class="col col-md-2"><strong></strong></div>
    <div class="col col-md-6"><input type="text" id="nama" name="nama" placeholder="Masukkan Nama Barang" class="form-control"></div>
    <div class="col col-md-2"><input type="submit" value="Add Barang" class="btn btn-warning">
    
</div>

  </div>

  </form>



                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
              <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                <div class="row">
                  <div class="col-sm-12">
                  <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;"role="grid" aria-describedby="datatable_info">

                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ID BARANG </th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 127px;">NAMA BARANG</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">BARCODE</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">ACTION</th>
                        </tr>
                      </thead>

                      <tbody>
                       @foreach($barang as $b)
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{$b->ID_Barang}}</td>
                          <td class="sorting_1">{{$b->Nama}}</td>
                          <td  class="text-center p-t-b-40">
                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($b->ID_Barang, 'C128')}}" alt="barcode" />
                             <br> {{$b->ID_Barang}}
                          </td>
                          <td  class="sorting_1">
                       <center>
                      <a href="printBarcode_id/{{$b->ID_Barang}}" class="btn btn-primary"><i class="fa fa-print">Cetak</i></a></center>
                    </td>

                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </center>
                  </div>
                  </div>
              </div>
            </div>
            <center>
            <a href="barcodebarcode_pdf">
                      <button type="button" class="btn btn-success btn-pulse">
                        <i class="fa fa-print"></i> Cetak Barcode
                      </button>
                    </a></center></center>
            </div>


             
     


<!-- Prism -->
<script src="{{ asset('/assets/html/vendors/prism/prism.js') }}"></script>
<!-- Javascript -->
<script src="{{ asset('/assets/html/assets/js/examples/datatable.js') }}"></script>

@endsection


