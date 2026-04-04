<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

<div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        let calendarEl = document.getElementById('calendar');

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            height: 650,

            events: '/api/reservas',

            eventDisplay: 'block',

            eventDidMount: function(info) {
                info.el.style.borderRadius = '6px';
            }
        });

        calendar.render();
    });
</script>

<style>
    #calendar {
        background: white;
        padding: 15px;
        border-radius: 12px;
    }
</style>
