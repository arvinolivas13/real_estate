@extends('backend.master.index')

@section('title', 'Van Availability')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Van Availability</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <h3>Van Schedule</h3>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card flex-fill w-100 dashboard-greeting">
                        <div class="card-body py-3">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="addScheduleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addScheduleTitle">Add Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Customer</label>
                <select name="customer" id="customer" class="form-control">
                    <option value="">Select Customer</option>
                    <option value="AIRI SATOU">AIRI SATOU</option>
                    <option value="ANGELICA RAMOS">ANGELICA RAMOS</option>
                    <option value="ASHTON COX">ASHTON COX</option>
                    <option value="BRADLEY GREER">BRADLEY GREER</option>
                    <option value="BRUNO NASH">BRUNO NASH</option>
                    <option value="CEDRIC KELLY">CEDRIC KELLY</option>
                    <option value="FINN CAMACHO">FINN CAMACHO</option>
                    <option value="GARRET WINTERS">GARRET WINTERS</option>
                    <option value="GAVIN JOYCE">GAVIN JOYCE</option>
                    <option value="HALEY KENNEDY">HALEY KENNEDY</option>
                    <option value="LAEL GREER">LAEL GREER</option>
                </select>
            </div>
            <div class="form-group">
                <label>Area</label>
                <select name="area" id="area" class="form-control">
                    <option value="">Select Area</option>
                    <option value="Grand Villas Farm Phase 1">Grand Villas Farm Phase 1</option>
                    <option value="Grand Villas Farm Phase 2">Grand Villas Farm Phase 2</option>
                    <option value="Grand Villas Farm Phase 2-B">Grand Villas Farm Phase 2-B</option>
                    <option value="Grand Villas Farm East 1">Grand Villas Farm East 1</option>
                    <option value="Grand Villas Farm East 2">Grand Villas Farm East 2</option>
                </select>
            </div>
            <div class="form-group">
                <label>Slot</label>
                <input name="slot" id="slot" type="number" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save">Save changes</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="viewSchedule" tabindex="-1" role="dialog" aria-labelledby="viewScheduleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewScheduleTitle">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="schedule">
                <b>Schedule for:</b>
                <div class="schedule-info"></div>
            </div>
            <div class="schedule-date"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    var date_selected = '';
    $(document).ready(function() {
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '2022-03-01',
        navLinks: true,
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            $('#addSchedule').modal('show');
            date_selected = arg.startStr;
        },
        eventClick: function(arg) {
            $('#viewSchedule').modal('show');
            $('.schedule-info').text(arg.event.title);
            $('.schedule-date').html("<b>Date:</b> " + arg.event.startStr);
            console.log(arg);
            // if (confirm('Are you sure you want to delete this event?')) {
            //     arg.event.remove()
            // }
        },
        editable: true,
        dayMaxEvents: true, 
        events: [
            {
                title: 'AIRI SATOU - Grand Villas Farm Phase 1',
                start: '2022-03-01',
                backgroundColor: "#ff7171",
                borderColor: "transparent"
            },
            {
                title: 'BRUNO NASH - Grand Villas Farm Phase 1',
                start: '2022-03-01',
                backgroundColor: "#5dafff",
                borderColor: "transparent"
            },
            {
                title: 'BRUNO NASH - Grand Villas Farm Phase 1',
                start: '2022-03-15',
                backgroundColor: "#5dafff",
                borderColor: "transparent"
            },
            {
                title: 'CEDRIC KELLY- Grand Villas Farm Phase 2-B',
                start: '2022-03-21',
                backgroundColor: "#31cf1d",
                borderColor: "transparent"
            },
            {
                title: 'HALEY KENNEDY- Grand Villas Farm East 1',
                start: '2022-03-11',
                backgroundColor: "#e1a63a",
                borderColor: "transparent"
            },
            {
                title: 'HALEY KENNEDY- Grand Villas Farm East 1',
                start: '2022-03-31',
                backgroundColor: "#e1a63a",
                borderColor: "transparent"
            },
            {
                title: 'AIRI SATOU - Grand Villas Farm Phase 1',
                start: '2022-03-11',
                backgroundColor: "#ff7171",
                borderColor: "transparent"
            },
            {
                title: 'ANGELICA RAMOS - Grand Villas Farm Phase 3',
                start: '2022-03-11'
            }
        ]
        });

        calendar.render();
        
        $('.save').click(function(){
            calendar.addEvent({
                title: $('#customer').val() + " - " + $('#area').val(),
                start: date_selected
            });

            calendar.unselect();
            $('#addSchedule').modal('hide');
        });
    });

</script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
.schedule {
    padding: 10px;
    background: #eee;
    border-radius: 3px;
    margin-bottom: 20px;
}
</style>
@endsection
@stop