@extends('backend.master.template')

@section('title', 'Area')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Area</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
            <h3>List of Area</h3>
            <div class="area-container row">
                <div class="col-xl-3 col-lg-3 col-sm-12" data-toggle="modal" data-target="#areaModal">
                    <div class="area" style="background: url('/images/area/add.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">10/20</span>
                            <span class="area-name">Grand Villas Farm Phase 1</span>
                            <span class="area-type">Farm Lot</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                @foreach ($areas as $area)
                    <div class="col-xl-3 col-lg-3 col-sm-12">
                        <div class="area" style="background: url('/images/area/{{$area->image}}')no-repeat;">
                            <div class="area-body">
                                <span class="col-md-6 area-count">14/20</span>
                                <span class="area-name">{{ $area->name }}</span>
                                <span class="area-type">{{ $area->type }}</span>
                                <span class="area-details">{{ $area->description }}.</span>
                                <div class="row">
                                    <a href="#" class="align-middle edit" onclick="edit({{ $area->id }})" title="Edit" data-toggle="modal" data-target="#areaModal" id={{$area->id}} ><i class="align-middle fas fa-fw fa-pen" style="color: black"></i></a>
                                    <a href="{{url('area/destroy/' . $area->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash" style="color: black"></i></a>
                                    <a href="{{url('area_detail/' . $area->id)}}"><i class="align-middle fas fa-fw fa-eye" style="color: black"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

    {{-- MODAL --}}
<div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form" action="{{url('area/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Area Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Area Name" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Description <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Address <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group col-md-12">
                    <label class="inputPassword4">Type <span style="color: red">*</span></label>
                    <select class="form-control" name="type" required>
                        <option value="FARM LOT">FARM LOT</option>
                        <option value="RESIDENTIAL">RESIDENTIAL</option>
                        <option value="COMMERCIAL">COMMERCIAL</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group col-md-12">
                    <label class="inputPassword4">Status <span style="color: red">*</span></label>
                    <select class="form-control" name="status" required>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        function edit(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/area/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('#modal-form').attr('action', 'area/update/' + data.area.id);
                    $('.modal-title').text('Update Area');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                }
            });
        }

        $(function() {

        });

    </script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
.area {
    background-position: center center !important;
    background-size: cover !important;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    margin: 10px 0;
}
.area:hover {
    transform: scale(1.05);
}
.area-body {
    background: rgba(0,0,0,0.4);
    color: #fff;
    padding: 10px;
    border-radius: 8px;
}
span.area-count {
    display: block !important;
    font-size: 50px;
}
span.area-name {
    display: block;
    font-size: 24px;
    padding: 10px 0;
    text-transform: uppercase;
    font-weight: bold;
}
span.area-details {
    font-size: 15px;
}
span.area-details {
    display: block;
}
span.area-type {
    display: inline-block !important;
    padding: 3px 10px;
    background: #2e9e5b;
    font-size: 12px;
    border-radius: 50px;
    text-transform: uppercase;
}
</style>
@endsection
@stop