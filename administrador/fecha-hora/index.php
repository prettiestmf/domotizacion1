
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Control de luces del aula</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <script src="https://kit.fontawesome.com/669aa46b77.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <!-- Moment.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>




  <!-- Biblioteca Datetimepicker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <!-- Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
  <div class="container my-5">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Control de luces del aula</h1>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Fecha y hora actual</h2>
            <p id="clock" style="font-size: 20px; font-weight:400; margin: 0 !important; display:inline !important; padding-left: 10px; padding-right: 10px;"></p>
            <p id="clock_hour" style="font-size: 20px; font-weight:400; margin: 0 !important; display:inline !important;"></p>
          </div>
        </div>
        <div class="card mt-5">
          <div class="card-body">
            <h2 class="card-title">Agregar evento</h2>
            <form id="add-event-form">
              <div class="mb-3">

                <label for="event-date" class="form-label">Coloque el día del evento</label>
                <select class="form-select" id="event-day" required>
                  <option value="" selected disabled>Seleccione un día de la semana...</option>
                  <option value="monday">Lunes</option>
                  <option value="tuesday">Martes</option>
                  <option value="wednesday">Miércoles</option>
                  <option value="thursday">Jueves</option>
                  <option value="friday">Viernes</option>
                  <option value="saturday">Sábado</option>
                  <option value="sunday">Domingo</option>
                </select> <br>
                <label for="event-date" class="form-label">Coloque la hora de inicio del evento</label> <br>
                <select id="hour-select-start" class="minimal-select">
                  <option value="" selected disabled>Hora</option>
                  <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                </select>

                <select id="minute-select-start" class="minimal-select">
                  <option value="" selected disabled>Minuto</option>
                  <?php for ($i = 0; $i <= 59; $i++) { ?>
                    <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                  <?php } ?>
                </select>

                <select id="period-select-start" class="minimal-select">
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select><br><br>
                <label for="event-date" class="form-label">Coloque la hora de fin del evento</label> <br>
                <select id="hour-select-end" class="minimal-select">
                  <option value="" selected disabled>Hora</option>
                  <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                </select>

                <select id="minute-select-end" class="minimal-select">
                  <option value="" selected disabled>Minuto</option>
                  <?php for ($i = 0; $i <= 59; $i++) { ?>
                    <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                  <?php } ?>
                </select>

                <select id="period-select-end" class="minimal-select">
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select> <br>
              </div>
              <button type="submit" class="btn btn-primary">Agregar evento</button>
            </form>
          </div>
        </div><br>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Eventos programados</h2>
            <a href="#" class="list-group-item list-group-item-action"> <b> Día - Hora inicio - Hora fin </b></a>
            <div id="event-list" class="list-group"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
  <script>
    $(function() {
      $('#datetimepicker').datetimepicker();
    });
    // Inicializar Flatpickr
    flatpickr("#datetimepicker-input", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      minDate: "today",
      defaultHour: 12
    });


    function updateClock() {
      $('#clock').text(moment().format('LL'));
      $('#clock_hour').text(moment().format('LTS'));
    }

    $(document).ready(function() {
      // Actualizar el reloj cada segundo

      setInterval(updateClock, 1000);



      // Enviar formulario de agregar evento
      $("#add-event-form").submit(function(e) {
        e.preventDefault();
        
        let event_day = $("#event-day").val();
        
        let hour_start = $("#hour-select-start").val();
        let minute_start = $("#minute-select-start").val();
        let period_start = $("#period-select-start").val();

        let time_start = hour_start+":"+minute_start+" "+period_start;
      

        let hour_end = $("#hour-select-end").val();
        let minute_end = $("#minute-select-end").val();
        let period_end = $("#period-select-end").val();

        let time_end = hour_end+":"+minute_end+" "+period_end; 
        
        

        // Enviar datos al servidor
        $.post("add-event.php", {
          event_day: event_day,
          time_start: time_start,
          time_end: time_end,

        }, function(data) {
          // Mostrar mensaje de éxito o error
          if (data.success) {
            alert(data.message);
            location.reload();
          } else {
            alert(data.message);
           
          }
        }, 'json');


        // Limpiar formulario
        $("#event-date").val("");
        $("#event-action").val("").change();
      });

      // Cargar lista de eventos
      $.get("get-events.php", function(data) {
        if (data.events && data.events.length > 0) {
          // Mostrar lista de eventos
          let events = data.events;
          for (let i = 0; i < events.length; i++) {
            let event = events[i];
            let event_day = event.event_day;
            let event_time_start = event.event_time_start;
            let event_time_end = event.event_time_end;

            $("#event-list").append(`<a href="#" class="list-group-item list-group-item-action">${event_day} - ${event_time_start} - ${event_time_end}</a>`);
          }
        } else {
          $("#event-list").append(`<a href="#" class="list-group-item list-group-item-action">No hay eventos programados.</a>`);

        }
      });
    });
  </script>
</body>

</html>
