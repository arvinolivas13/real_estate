<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brilliant Five J Construction and Development Corp.</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="{{asset('/js/jquery.validate.min.js')}}" ></script>
    <link href="{{{ URL::asset('backend/css/modern.css') }}}" rel="stylesheet">
    <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/custom.css')}}" rel="stylesheet">
    {{-- <script src="{{{ URL::asset('backend/js/settings.js') }}}"></script> --}}
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{asset('lib/main.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
    @yield('styles')
    @yield('styles-2')
</head>
<body>
    <div class="wrapper">
        @include('backend.partial.sidebar')
        <div class="main" >
            @include('backend.partial.header')
            <div class="mt-3 p-2 ">
                @yield('content')
            </div>
            @include('backend.partial.footer')
        </div>
    </div>

    <div class="modal fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="delete_func.yes()">Yes</button>
            </div>
        </div>
        </div>
    </div>
    
    <div class="modal fade" id="lookupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="lookupModalTitle">Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table id="lookup" class="table table-striped" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="{{{ URL::asset('backend/js/app.js') }}}"></script>
    <script src="{{asset('lib/main.js')}}"></script>
    <script src="{{asset('/plugins/cropimg/cropzee.js')}}" ></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}" ></script>
    <script src="{{asset('/js/global.js')}}" ></script>
    <script>
		$(function() {
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
            
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
            
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
            
		    $("#image").cropzee({
                allowedInputs: ['png','jpg','jpeg']
            });
		});
	</script>
    
    @yield('chart-js')
    @yield('calendar-js')

</body>
</html>