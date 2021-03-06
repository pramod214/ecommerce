@extends('admin.adminLayout.admin_design')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Slider</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Slider</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Sliders</h4>
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif

                        @if(Session::has('flash_message_info'))
                            <div class="alert alert-primary alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_info') !!}</strong>
                            </div>
                        @endif

                        @if(Session::has('flash_message_danger'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_danger') !!}</strong>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$slider->name}}</td>
                                        <td>{{$slider->body}}</td>
                                        <td>
                                            <img src="{{asset('public/adminpanel/uploads/slider/'.$slider->image)}}" alt="" width="200px">
                                        </td>
                                        <td>
                                            <a href="{{route('edit',$slider->id)}}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a rel="{{$slider->id}}" rel1="delete-slider" href="javascript:" class="btn btn-danger deleteRecord">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
@endsection


@section('style')
    <link href="{{asset('public/adminpanel/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/adminpanel/sweetalert/sweetalert.css')}}">
@endsection

@section('script')
    <script src="{{asset('public/adminpanel/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('public/adminpanel/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminpanel/sweetalert/sweetalert.min.js')}}">
    </script>
    <script>
        $(document).ready(function () {
            $(".deleteRecord").click(function(){
                var id = $(this).attr('rel');
                var deleteFunction = $(this).attr('rel1');
                swal({
                        title: "Are You Sure",
                        text: "You will not be able to recover this record again",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Delete it!"
                    },
                    function(){
                        window.location.href="/upakar/admin/"+deleteFunction+"/"+id;
                    }
                );
            });
        });
    </script>

    <script>
        @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}')
        @endif
        @if(Session::has('info'))
        toastr.info('{{Session::get('info')}}')
        @endif
        @if(Session::has('danger'))
        toastr.error('{{Session::get('danger')}}')
        @endif
    </script>

@endsection
