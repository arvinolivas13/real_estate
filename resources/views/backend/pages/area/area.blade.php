@extends('backend.master.template')

@section('title', 'Area')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Area</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;padding:10px 30px;">
            <h3>List of Area</h3>

            <div class="area-container row">
                <div class="col-xl-3 col-lg-3 col-sm-12">
                    <button class="btn btn-light add-btn" data-toggle="modal" data-target="#areaModal"><i class="fas fa-plus"></i></button>
                </div>
                
                @foreach ($areas as $area)
                <div class="col-xl-3 col-lg-3 col-sm-12">
                    <div class="area">
                        <button class="btn edit-pen" onclick="edit({{ $area->id }});" data-toggle="modal" data-target="#areaModal" id="{{$area->id}}"><i class="fas fa-pen"></i></button>
                        <img src="/images/area/{{$area->image}}" alt="/images/area/{{$area->image}}" onclick="location.href='{{url('area_detail/' . $area->id)}}'">
                        <div class="area-details">
                            <span class="area-name">{{ $area->name . ' (' . $area->code . ')' }}</span>
                            <span class="area-type">{{ $area->type }}</span>
                            <span class="area-description">{{ $area->description }}</span>
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
                    <label for="inputPassword4">Area Code <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Area Code" required>
                </div>
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
.add-btn {
    height: 100%;
    width: 100%;
    font-size: 90px;
}
.area img {
    width: 100%;
    height: 210px;
}
.area {
    box-shadow: 0 0 12px 0px #ccc;
    cursor: pointer;
}
.area-details {
    padding: 10px 15px;
    background: #fff;
}
.area-name {
    font-weight: bold;
    text-transform: uppercase;
    color: #343a40;
    font-size: 17px;
    display: block;
}
.area-type {
    font-size: 12px;
    color: #2e9e5b;
    display: block;
}
.area-description {
    font-size: 12px;
}
.edit-pen {
    position: absolute;
    background: #ffffffd6;
    margin: 6px;
    color: #000;
}
</style>
@endsection
@stop