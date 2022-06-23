@extends('backend.master.template')

@section('title', 'Document Management')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Document Management</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;padding:10px 30px;">
            <h3>List of Area</h3>
            <iframe src="/elfinder#elf_l1_XA" frameborder="0" width="100%" height="500px"></iframe>

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
@endsection
@stop