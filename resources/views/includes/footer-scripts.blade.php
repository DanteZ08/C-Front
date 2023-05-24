    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/js/adminlte.js')}}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    @if(\Request::route()->getName() == "index")
    <script>
        const hoursDropdown = document.getElementById("hoursDropdown");

        function generateRandomTime() {
            var randomHour = Math.floor(Math.random() * 25); // Generate a random hour between 0 and 24
            var randomMinute = Math.floor(Math.random() * 60); // Generate a random minute between 0 and 59

            // Format the hour and minute as two digits with leading zeros
            var formattedHour = ('0' + randomHour).slice(-2);
            var formattedMinute = ('0' + randomMinute).slice(-2);

            // Get the current date
            var currentDate = new Date();

            // Set the hour and minute of the current date to the generated random time
            currentDate.setHours(randomHour, randomMinute);

            // Format the date as "YYYY-MM-DD HH:mm:ss"
            var formattedDate = currentDate.toISOString().split('T')[0] + ' ' +
                formattedHour + ':' +
                formattedMinute + ':' +
                currentDate.getSeconds();

            return formattedDate;
        }

        // Generate and log 10 random dates in "YYYY-MM-DD HH:mm:ss" format




        let test = generateRandomTime();
        jQuery.ajax({
            url: "api/calculateAvailableHours",
            method: 'GET',
            dataType: 'JSON',
            data: {
                _token: '{{csrf_token()}}',
                date: '2023-05-24 10:08:23',
                user: '{{user()->UID}}'
            },

            success: function (response) {
                for (var i = 0; i < 10; i++) {
                    var randomDate = generateRandomTime();
                    console.log(randomDate);
                }
            },
            error: function () {}
        });
        var date = new Date()
          var d    = date.getDay(),
              m    = date.getMonth(),
              y    = date.getFullYear()

        let createAppointment = function(UID){
            jQuery.ajax({
            url: "api/createAppointment",
            method: 'GET',
            dataType: 'JSON',
            data: {
                _token: '{{csrf_token()}}',
                date: test,
                consultant: UID,
                customer: '{{user()->UID}}'
            },

            success: function (response) {
                console.log(test)
                console.log(response)
                console.log(UID)
            },
            error: function () {}
        });
        }

    </script>
    @endif
