<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistem Peminjaman Buku Perpustakaan</title>

    <link href="{{ asset('assetadmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assetadmin/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assetadmin/css/plugins/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetadmin/css/plugins/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetadmin/css/plugins/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetadmin/css/plugins/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetadmin/css/plugins/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetadmin/img/logomi.png')}}" rel="shortcut icon" >
    <!-- start: Javascript -->
    <script src="{{ asset('assetadmin/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/jquery.ui.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{ asset('assetadmin/js/plugins/jquery.vmap.min.js')}}"></script> -->

  </head>
  <body id="mimin" style="background-image: url('assetadmin/img/bg.jpg'); background-size: 100% 100%; min-height: 700px;">
    <div class="container">
      <form class="form-signin" method="POST" action="{{ route('login') }}">
          @csrf
        <div class="panel periodic-login">
          <div class="panel-body text-center">
            <h2>Sistem Peminjaman</h2>
            <p class="atomic-mass">Buku</p>
            <p class="element-name">Perpustakaan</p>

            <div class="form-group form-animate-text" style="margin-top:40px !important;">
              <input type="text" class="form-text @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              <span class="bar"></span>
              <label>Username</label>
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>


            <div class="form-group form-animate-text" style="margin-top:40px !important;">
              <input type="password" class="form-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <span class="bar"></span>
              <label>Password</label>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>


            <div class="form-group form-animate-text">
              <span class="bar"></span>
            <input type="submit" class="btn col-md-12" value="Log In"/>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>


    <!-- plugins -->
    <script src="{{ asset('assetadmin/js/plugins/moment.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/jquery.nicescroll.js')}}"></script>

    <!-- <script src="{{ asset('assetadmin/js/plugins/maps/jquery.vmap.world.js')}}"></script> -->
    <script src="{{ asset('assetadmin/js/plugins/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/chart.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/bootstrap-material-datetimepicker.js')}}"></script>



    <!-- plugins -->
    <script src="{{ asset('assetadmin/js/plugins/jquery.datatables.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/datatables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('assetadmin/js/plugins/jquery.nicescroll.js')}}"></script>


    <!-- custom -->
     <script src="{{ asset('assetadmin/js/main.js')}}"></script>
     <script type="text/javascript">
     	$('#delete').click(function(e){
     	      e.preventDefault()
     	      if (confirm('Hapus Data?')) {
     	          $(e.target).closest('form').submit()
     	      }
     	  });
     	</script>
      <script type="text/javascript">
      	$('#delete2').click(function(e){
      	      e.preventDefault()
      	      if (confirm('Hapus Data?')) {
      	          $(e.target).closest('form').submit()
      	      }
      	  });
      	</script>
     <script type="text/javascript">
       $(document).ready(function(){
         $('#datatables-example').DataTable();
       });
     </script>
     <script type="text/javascript">
      (function(jQuery){

        // start: Chart =============

        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {

            var tooltipEl = $('#chartjs-tooltip');

            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }

            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);

            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
                        '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                        '</div>'
                    ].join('');
                }
                tooltipEl.html(innerHtml);
            }

            tooltipEl.css({
                opacity: 1,
                left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                fontFamily: tooltip.fontFamily,
                fontSize: tooltip.fontSize,
                fontStyle: tooltip.fontStyle
            });
        };
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.4)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(66,69,67,0.3)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(21,113,186,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }]
        };

        var doughnutData = [
                {
                    value: 300,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 50,
                    color: "#1AD576",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#0F5E36",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];


        var doughnutData2 = [
                {
                    value: 100,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#FF6656",
                    highlight: "#FF6656",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#FD786A",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];

        var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(21,113,186,0.5)",
                        strokeColor: "rgba(151,187,205,0.8)",
                        highlightFill: "rgba(21,113,186,0.2)",
                        highlightStroke: "rgba(21,113,186,0.2)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };



        //  end:  Chart =============

        // start: Calendar =========
         $('.dashboard .calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2015-02-12',
            businessHours: true, // display business hours
            editable: true,
            events: [
                {
                    title: 'Business Lunch',
                    start: '2015-02-03T13:00:00',
                    constraint: 'businessHours'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-13T11:00:00',
                    constraint: 'availableForMeeting', // defined below
                    color: '#20C572'
                },
                {
                    title: 'Conference',
                    start: '2015-02-18',
                    end: '2015-02-20'
                },
                {
                    title: 'Party',
                    start: '2015-02-29T20:00:00'
                },

                // areas where "Meeting" must be dropped
                {
                    id: 'availableForMeeting',
                    start: '2015-02-11T10:00:00',
                    end: '2015-02-11T16:00:00',
                    rendering: 'background'
                },
                {
                    id: 'availableForMeeting',
                    start: '2015-02-13T10:00:00',
                    end: '2015-02-13T16:00:00',
                    rendering: 'background'
                },

                // red areas where no events can be dropped
                {
                    start: '2015-02-24',
                    end: '2015-02-28',
                    overlap: false,
                    rendering: 'background',
                    color: '#FF6656'
                },
                {
                    start: '2015-02-06',
                    end: '2015-02-08',
                    overlap: true,
                    rendering: 'background',
                    color: '#FF6656'
                }
            ]
        });
        // end : Calendar==========

        // start: Maps============

        //   jQuery('.maps').vectorMap({
        //     map: 'world_en',
        //     backgroundColor: null,
        //     color: '#fff',
        //     hoverOpacity: 0.7,
        //     selectedColor: '#666666',
        //     enableZoom: true,
        //     showTooltip: true,
        //     values: sample_data,
        //     scaleColors: ['#C8EEFF', '#006491'],
        //     normalizeFunction: 'polynomial'
        // });

        // end: Maps==============

      })(jQuery);
     </script>
     @yield('footer')
   </body>
</html>
