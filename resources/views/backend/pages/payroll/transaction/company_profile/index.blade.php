@extends('backend.master.index')

@section('title', 'Company Profile')

@section('breadcrumbs')
    <span>Transaction</span>  / <span>Payroll</span> / <span class="highlight">Company Profile</span>
@endsection

@section('action-header')
    @include('backend.partial.component.action_buttons')
@endsection

@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="tab" style="height:100%;">

            <div class="row" style="height:calc(100% - 50px)">
                @section('left-content')
                <div>
                    <div class="card">
                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#general_tab" role="tab">General Tab</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#visual_appearance" role="tab">Visual Appearance</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#work_calendar" role="tab">Work Calendar</a>
                        </div>
                    </div>
                </div>
                @endsection
                <div class="col-md-12 col-xl-12">
                    <form id="company_profile" method="post" enctype="multipart/form-data">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="general_tab" role="tabpanel">
                                <div class="card" style="height: 100%;">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Company Information</h5>
                                        @csrf
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                @include('backend.partial.component.lookup', [
                                                    'label' => "Company Name", 
                                                    'placeholder' => '',
                                                    'id' => "company_name", 
                                                    'title' => "Company", 
                                                    'url' => "/payroll/company-profile/get", 
                                                    'data' => array(
                                                                array('data' => "DT_RowIndex", 'title' => "#"), 
                                                                array('data' => "company_name", 'title' => "Company Name")
                                                    ),
                                                    'disable' => false
                                                ])
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="form-group email">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="form-group contact_number">
                                                    <label>Contact Number</label>
                                                    <input type="number" class="form-control" id="contact_number" name="contact_number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-8 col-md-8 col-sm-6">
                                                <div class="form-group address">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" id="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="form-group legal_name">
                                                    <label>Legal Name</label>
                                                    <input type="text" class="form-control" id="legal_name" name="legal_name">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="form-group tin">
                                                    <label>TIN Number</label>
                                                    <input type="text" class="form-control" id="tin" name="tin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="visual_appearance" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Visual Appearance</h5>
                                        <div class="form-row">
                                            <div class="col-xl-4 col-md-4 col-sm-6 mb-2">
                                                <label>Company Logo</label>
                                                <div id="" class="image-previewer" onclick="$('#image').click()">
                                                    <img src="/images/company/default.png" alt="" width="100%" id="viewer" data-cropzee="image">
                                                </div>
                                                <input id="image" type="file" name="company_logo" class="form-control" onchange="scion.fileView(event)" style="display:none;">
                                                <button class="btn btn-primary" type="button" onclick="$('#image').click()">Select Photo</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="form-group theme">
                                                    <label>Theme</label>
                                                    <input type="text" class="form-control" id="theme" name="theme" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="work_calendar" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Work Calendar</h5>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4 mb-2">
                                                <b>Days</b>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4 mb-2">
                                                <b>Start Time</b>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4 mb-2">
                                                <b>End Time</b>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Sunday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_1">
                                                    <input type="time" class="form-control" id="start_time_1" name="start_time_1">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_1">
                                                    <input type="time" class="form-control" id="end_time_1" name="end_time_1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Monday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_2">
                                                    <input type="time" class="form-control" id="start_time_2" name="start_time_2">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_2">
                                                    <input type="time" class="form-control" id="end_time_2" name="end_time_2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Tuesday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_3">
                                                    <input type="time" class="form-control" id="start_time_3" name="start_time_3">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_3">
                                                    <input type="time" class="form-control" id="end_time_3" name="end_time_3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Wednesday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_4">
                                                    <input type="time" class="form-control" id="start_time_4" name="start_time_4">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_4">
                                                    <input type="time" class="form-control" id="end_time_4" name="end_time_4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Thursday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_5">
                                                    <input type="time" class="form-control" id="start_time_5" name="start_time_5">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_5">
                                                    <input type="time" class="form-control" id="end_time_5" name="end_time_5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Friday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_6">
                                                    <input type="time" class="form-control" id="start_time_6" name="start_time_6">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_6">
                                                    <input type="time" class="form-control" id="end_time_6" name="end_time_6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                Saturday
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group start_time_7">
                                                    <input type="time" class="form-control" id="start_time_7" name="start_time_7">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                <div class="form-group end_time_7">
                                                    <input type="time" class="form-control" id="end_time_7" name="end_time_7">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        
        var company_id = '';
        $(function() {

            $('body').delegate('#lookup tbody tr','click', function () {
                var data = $('#lookup').DataTable().row(this).data();
                generateRecord(data.id);
            });

        });

        function saveRecord() {
            $('#company_profile').submit(function(e) {
                e.preventDefault();
                var formData = $("#company_profile").serialize();
                
                if(record_id === null) {
                    scion.record.add('/payroll/company-profile/save', formData  + "&image=" + ($('#image').val() !== ''?cropzeeGetImage('image'):''), function(response) {
                        record_id = response.last_record.id;
                        $('.action-button .add').prop('disabled', false);
                        $('.action-button .delete').prop('disabled', false);
                    });
                }
                else {
                    scion.record.update('/payroll/company-profile/update', record_id, formData + "&image=" + ($('#image').val() !== ''?cropzeeGetImage('image'):''));
                }
            }).trigger('submit');
        }
        
        function generateRecord(id){
            company_id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/payroll/company-profile/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('#lookupModal').modal('hide');
                    record_id = id;

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                            if(k === "company_logo") {
                                $('#viewer').attr('src', '/images/company/' + v);
                                $('.image-previewer').html('<img src="/images/company/'+v+'" alt="" width="100%" id="viewer" data-cropzee="image">');
                            }
                        });
                        $.each(this.employment_tab, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                    $('.action-button .add').prop('disabled', false);
                    $('.action-button .delete').prop('disabled', false);
                }
            });
            $('.nav-link:not(.active)').removeClass('disabled');
        }
        
        function resetForm() {
            employee_id = '';
            record_id = null;
            $("#company_profile")[0].reset();
            $('#viewer').attr('src', '/images/company/default.png');
            $('span.error-message').remove();
        }
    </script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
.nav-tabs a {
    padding: 10px 25px !important;
    background: #47b4ea !important;
    font-size: 12px;
    color: #fff !important;
}
.nav-tabs .nav-item {
    margin: 0px !important;
}
.nav-tabs a.nav-link.active {
    background: #fff !important;
    font-weight: normal !important;
    color: #000 !important;
}
.nav-tabs a.nav-link.disabled {
    background: #74ccf7 !important;
}
.image-previewer {
    width: 100%;
}
.light-modal-content {
    background: #fff !important;
}
.light-modal-footer>div {
    background: #3b7ddd;
}
.required {
    color: red;
    font-weight: bold;
}
#viewer {
    width: 100%;
}
ul.nav.nav-tabs {
    background: #47b4ea;
    border-radius: 3px;
}
.employee-details {
    padding: 10px;
    background: #eee;
    font-weight: bold;
    margin: 0px;
    margin-bottom: 15px;
}
.tab-content {
    padding: 0px !important;
    box-shadow: none !important;
    background: transparent !important;
    /* height: 100%; */
}
/* .tab-pane {
    height: 100%;
} */
.list-group-item.active{
    z-index: 0 !important;
}
.list-group-item-action:focus, .list-group-item-action:hover {
    z-index: 0 !important;
}
</style>
@endsection
@stop