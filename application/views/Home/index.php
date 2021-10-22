<link href='<?= base_url(); ?>assets/plugins/fullcalendar/lib/main.css' rel='stylesheet' />
<script src='<?= base_url(); ?>assets/plugins/fullcalendar/lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

      // US Holidays
      events: '',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });

</script>
    <style type="text/css">
    .google-maps {
        position: relative;
        padding-bottom: 75%;
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
    .link a{
        color: #fff;
        text-decoration: underline;
    }
    .link a:hover{
        color: #fff;
    }
    #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-green">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Pengunjung</div>
                            <div class="number">100 Orang</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-red">timeline</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Postingan</div>
                            <div class="number"><?= $hitung_post; ?> Postingan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-orange">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Total User</div>
                            <div class="number"><?= $hitung_usr ?> orang</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            
            <div class="row clearfix">
                <!-- Area Chart -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>KALENDER</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <div id='loading'>loading...</div>

                            <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>NOTES</h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#pending" data-toggle="tab">Pending</a></li>
                                <li role="presentation"><a href="#verifikasi" data-toggle="tab">Verifikasi</a></li>
                            </ul> -->

                            <!-- Tab panes -->
                            <!-- <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="pending">
                                    <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-pink">14 New</span> Cras justo odio
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-cyan">99 Unread</span>Dapibus ac facilisis in
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-teal">99+</span>Morbi leo risus
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-orange">21</span>Porta ac consectetur ac
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-purple">18</span>Vestibulum at eros
                                </a>
                            </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="verifikasi">
                                    <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-pink">14 New</span> Cras justo odio
                                </a>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Morris Plugin Js -->
    <script src="<?= base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/morrisjs/morris.js"></script>

    <script src="<?= base_url(); ?>assets/js/admin.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/charts/morris.js"></script>

    <!-- Demo Js -->
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>