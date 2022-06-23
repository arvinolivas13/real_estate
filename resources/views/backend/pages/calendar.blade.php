
@extends('backend.master.index')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <span>Dashboard</span>
@endsection

@section('content')
<div class="main">
<div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100 dashboard-greeting">
                <div class="card-body py-3">
                    <h1 class="card-title mb-0" style="">Tripping Schedule Calendar</h1>
                    <br>
                    <div class="card-details">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100 dashboard-greeting">
                <div class="card-body py-3">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
</div>
</div>
@endsection

@section('styles')
<style>
    h1.card-title.mb-0 {
    font-size: 22px;
    color: #2e9e5b;
    font-weight: bold;
}
</style>
@endsection

@section('calendar-js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
          {
            title: 'Grand Villas Farm Phase 1',
            start: '2020-09-01'
          },
          {
            title: 'Grand Villas Farm Phase 2',
            start: '2020-09-07',
            end: '2020-09-10'
          },
          {
            groupId: 999,
            title: 'Van 1 - Arvin Olivas',
            start: '2020-09-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Van 1 - Sunshine Arias',
            start: '2020-09-16T16:00:00'
          },
          {
            title: 'Grand East Villa 1',
            start: '2020-09-11',
            end: '2020-09-13'
          },
          {
            title: 'Van 1 - Juan Dela Cruz',
            start: '2020-09-12T10:30:00',
            end: '2020-09-12T12:30:00'
          },
          {
            title: 'Van 2 - Maria Reyes',
            start: '2020-09-12T12:00:00'
          },
          {
            title: 'Van 3 - Noemi Perez',
            start: '2020-09-12T14:30:00'
          },
          {
            title: 'Van 4 - Kevin Alas',
            start: '2020-09-12T17:30:00'
          },
          {
            title: 'Van 5 - Tina Mones',
            start: '2020-09-12T20:00:00'
          },
          {
            title: 'Van 1 - Jetro Macalipay',
            start: '2020-09-13T07:00:00'
          },
          {
            title: 'Holiday (No Viewing)',
            start: '2020-09-28'
          }
        ]
      });
  
      calendar.render();
    });
  
  </script>
@endsection