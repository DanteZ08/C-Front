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
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

    
    @if(\Request::route()->getName() == "index")
    <script>

        // Generates random Date, formats the results into (H:i)
        function generateRandomTime() {
            var randomHour = Math.floor(Math.random() * 25);
            var randomMinute = Math.floor(Math.random() * 60);

            var formattedHour = ('0' + randomHour).slice(-2);
            var formattedMinute = ('0' + randomMinute).slice(-2);

            var currentDate = new Date();

            currentDate.setHours(randomHour, randomMinute);

            var formattedDate = currentDate.toISOString().split('T')[0] + ' ' +
                formattedHour + ':' +
                formattedMinute + ':' +
                currentDate.getSeconds();

            return formattedDate;
        }


        let randomTime = generateRandomTime();

        let createAppointment = function (UID) {
            jQuery.ajax({
                url: "api/createAppointment",
                method: 'GET',
                dataType: 'JSON',
                data: {
                    _token: '{{csrf_token()}}',
                    date: randomTime,
                    consultant: UID,
                    customer: '{{user()->UID}}'
                },

                success: function (response) {
                    randomTime = generateRandomTime();
                    let message = "";
                    switch (response) {
                        case 0:
                            toastr.warning('This consultant is on weekend break!');
                            break;
                        case 1:
                            toastr.warning('This consultant is on break!');
                            break;
                        case 2:
                            toastr.warning('This consultant is in another appointment!');
                            break;
                        case 4:
                            toastr.success('You have succesfully made an appointment!');
                            document.getElementById('appointmentCreate-' + UID).disabled = true;
                            break;
                        default:
                            break;
                    }
                    
                },
                error: function () {}
            });
        }

    </script>
    @endif
