@extends('tampilan/index')
@section('konten')
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
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ID CUSTOMER</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 127px;">ID KELURAHAN</th>

                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">NAMA</th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ALAMAT </th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">FOTO</th>

                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">FILE PATH </th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 75px;">ACTION </th>
                        </tr>
                      </thead>


        
        <a class="btn btn-success" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus" aria-hidden="true"></i>
          Add Customer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerCreate1">Add Customer 1</a>
          <a class="dropdown-item" href="customerCreate2">Add Customer 2</a>
        </div>
      </li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        
      </div>
    </div>
</div>
 

                <tbody>
                  @foreach($customer as $c)
                  <tr role="row" class="odd">
                    <td class="sorting_1">{{ $c->ID_CUSTOMER }}</td>
                    <td class="sorting_1">{{ $c->ID_KELURAHAN }}</td>
                    <td class="sorting_1">{{ $c->NAMA }}</td>
                    <td class="sorting_1">{{ $c->ALAMAT }}</td>
                    <td>@if ( isset($c->FOTO) )
                      <img src="{{(base64_decode($c->FOTO))}}">@endif</td>
                    <td>@if ( isset($c->FILE_PATH) )
                      <img src="{{ asset($c->FILE_PATH) }}"> @endif</td>
                    <td>
                      <center>
                      <a href="customerDestroy{{ $c->ID_CUSTOMER }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></center>
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
  <!-- /page content -->
  </div>
</div>

@endsection