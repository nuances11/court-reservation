<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- BREADCRUMBS -->
            <ol class="breadcrumb bc-3">
                <li class="active">
                    <strong>Home</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />

                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $('.pie').sparkline('html', {
                                type: 'pie',
                                borderWidth: 0,
                                sliceColors: ['#3d4554', '#ee4749', '#00b19d']
                            });


                            $(".chart").sparkline([1, 2, 3, 1], {
                                type: 'pie',
                                barColor: '#485671',
                                height: '110px',
                                barWidth: 10,
                                barSpacing: 2
                            });

                            var map = $("#map");

                            map.vectorMap({
                                map: 'europe_merc_en',
                                zoomMin: '3',
                                backgroundColor: '#00a651',
                                focusOn: {
                                    x: 0.5,
                                    y: 0.8,
                                    scale: 3
                                }
                            });



                            // Rickshaw
                            var seriesData = [
                                [],
                                []
                            ];

                            var random = new Rickshaw.Fixtures.RandomData(50);

                            for (var i = 0; i < 90; i++) {
                                random.addData(seriesData);
                            }

                            var graph = new Rickshaw.Graph({
                                element: document.getElementById("rickshaw-chart-demo-2"),
                                height: 217,
                                renderer: 'area',
                                stroke: false,
                                preserve: true,
                                series: [{
                                    color: '#359ade',
                                    data: seriesData[0],
                                    name: 'Page Views'
                                }, {
                                    color: '#73c8ff',
                                    data: seriesData[1],
                                    name: 'Unique Users'
                                }, {
                                    color: '#e0f2ff',
                                    data: seriesData[1],
                                    name: 'Bounce Rate'
                                }]
                            });

                            graph.render();

                            var hoverDetail = new Rickshaw.Graph.HoverDetail({
                                graph: graph,
                                xFormatter: function (x) {
                                    return new Date(x * 1000).toString();
                                }
                            });

                            var legend = new Rickshaw.Graph.Legend({
                                graph: graph,
                                element: document.getElementById('rickshaw-legend')
                            });

                            var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight({
                                graph: graph,
                                legend: legend
                            });

                            setInterval(function () {
                                random.removeData(seriesData);
                                random.addData(seriesData);
                                graph.update();

                            }, 500);

                        });
                    </script>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well">
                                <h1><?php echo date("F jS, Y", strtotime("now")); ?></h1>
                                <h3>Welcome, 
                                    <strong><?= $_SESSION['full_name'] ?></strong>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-9">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">New vs Returning Visitors</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
                                                    <i class="entypo-cog"></i>
                                                </a>
                                                <a href="#" data-rel="collapse">
                                                    <i class="entypo-down-open"></i>
                                                </a>
                                                <a href="#" data-rel="reload">
                                                    <i class="entypo-arrows-ccw"></i>
                                                </a>
                                                <a href="#" data-rel="close">
                                                    <i class="entypo-cancel"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <center>
                                                <span class="chart"></span>
                                            </center>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">Latest Users</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
                                                    <i class="entypo-cog"></i>
                                                </a>
                                                <a href="#" data-rel="collapse">
                                                    <i class="entypo-down-open"></i>
                                                </a>
                                                <a href="#" data-rel="reload">
                                                    <i class="entypo-arrows-ccw"></i>
                                                </a>
                                                <a href="#" data-rel="close">
                                                    <i class="entypo-cancel"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Art Ramadani</td>
                                                    <td>CEO</td>
                                                    <td class="text-center">
                                                        <span class="pie">4,3,5</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>2</td>
                                                    <td>Filan Fisteku</td>
                                                    <td>Member</td>
                                                    <td class="text-center">
                                                        <span class="pie">1,3,4</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>3</td>
                                                    <td>Arlind Nushi</td>
                                                    <td>Co-founder</td>
                                                    <td class="text-center">
                                                        <span class="pie">5,3,2</span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>
                                            Real Time Stats
                                            <br />
                                            <small>current server uptime</small>
                                        </h4>
                                    </div>

                                    <div class="panel-options">
                                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
                                            <i class="entypo-cog"></i>
                                        </a>
                                        <a href="#" data-rel="collapse">
                                            <i class="entypo-down-open"></i>
                                        </a>
                                        <a href="#" data-rel="reload">
                                            <i class="entypo-arrows-ccw"></i>
                                        </a>
                                        <a href="#" data-rel="close">
                                            <i class="entypo-cancel"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="panel-body no-padding">
                                    <div id="rickshaw-chart-demo-2">
                                        <div id="rickshaw-legend"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3">

                            <div class="tile-progress tile-red">
                                <div class="tile-header">
                                    <h3>Page Views</h3>
                                    <span>so far in our blog, and our website.</span>
                                </div>

                                <div class="tile-progressbar">
                                    <span data-fill="35.5%"></span>
                                </div>

                                <div class="tile-footer">
                                    <h4>
                                        <span class="pct-counter">0</span>% increase
                                    </h4>

                                    <span>so far in our blog and our website</span>
                                </div>
                            </div>

                            <div class="tile-progress tile-green">
                                <div class="tile-header">
                                    <h3>Unique Users</h3>
                                    <span>so far in our blog, and our website.</span>
                                </div>

                                <div class="tile-progressbar">
                                    <span data-fill="51.2%"></span>
                                </div>

                                <div class="tile-footer">
                                    <h4>
                                        <span class="pct-counter">0</span>% increase
                                    </h4>

                                    <span>so far in our blog and our website</span>
                                </div>
                            </div>

                            <div class="tile-progress tile-aqua">
                                <div class="tile-header">
                                    <h3>Bounce Rate</h3>
                                    <span>so far in our blog, and our website.</span>
                                </div>

                                <div class="tile-progressbar">
                                    <span data-fill="69.9%"></span>
                                </div>

                                <div class="tile-footer">
                                    <h4>
                                        <span class="pct-counter">0</span>% increase
                                    </h4>

                                    <span>so far in our blog and our website</span>
                                </div>
                            </div>

                        </div>

                    </div>



                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default" data-collapsed="0">
                                <!-- to apply shadow add class "panel-shadow" -->
                                <!-- panel head -->
                                <div class="panel-heading">
                                    <div class="panel-title">World Maps</div>

                                    <div class="panel-options">
                                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-3" class="bg">
                                            <i class="entypo-cog"></i>
                                        </a>
                                        <a href="#" data-rel="collapse">
                                            <i class="entypo-down-open"></i>
                                        </a>
                                        <a href="#" data-rel="reload">
                                            <i class="entypo-arrows-ccw"></i>
                                        </a>
                                        <a href="#" data-rel="close">
                                            <i class="entypo-cancel"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- panel body -->
                                <div class="panel-body no-padding">
                                    <script type="text/javascript">
                                        jQuery(document).ready(function ($) {
                                            (function () {
                                                var myCustomColors = {
                                                    'GR': '#f04239',
                                                    'ES': '#f04239',
                                                    'PT': '#f04239',
                                                    'SE': '#f04239',
                                                    'SI': '#f04239',
                                                    'DK': '#f04239',
                                                    'DE': '#f04239',
                                                    'NL': '#f04239',
                                                    'BE': '#f04239',
                                                    'LU': '#f04239',
                                                    'BG': '#f04239',
                                                    'FR': '#f04239',
                                                    'GB': '#f04239',
                                                    'IE': '#f04239',
                                                    'IT': '#f04239',
                                                    'HR': '#f04239',
                                                    'RO': '#f04239',
                                                    'EE': '#f04239',
                                                    'LV': '#f04239',
                                                    'LT': '#f04239',
                                                    'PL': '#f04239',
                                                    'AT': '#f04239',
                                                    'HU': '#f04239',
                                                    'SK': '#f04239',
                                                    'CZ': '#f04239',
                                                    'LT': '#f04239',
                                                    'FI': '#f04239',
                                                    'CY': '#f04239',

                                                    // Arab League
                                                    'SA': '#06b53c',
                                                    'SO': '#06b53c',
                                                    'DZ': '#06b53c',
                                                    'EG': '#06b53c',
                                                    'LY': '#06b53c',
                                                    'TN': '#06b53c',
                                                    'YE': '#06b53c',
                                                    'QA': '#06b53c',
                                                    'JO': '#06b53c',
                                                    'KW': '#06b53c',
                                                    'OM': '#06b53c',
                                                    'LB': '#06b53c',
                                                    'SY': '#06b53c',
                                                    'PS': '#06b53c',
                                                    'IQ': '#06b53c',
                                                    'MA': '#06b53c',
                                                    'MR': '#06b53c',
                                                    'DJ': '#06b53c',
                                                    'AE': '#06b53c',
                                                    'BH': '#06b53c',
                                                    'KM': '#06b53c',

                                                    // NFATA
                                                    'US': '#2b303a',
                                                    'CA': '#2b303a',
                                                    'MX': '#2b303a',
                                                };

                                                map = new jvm.WorldMap({
                                                    map: 'world_mill_en',
                                                    container: $('#worldmap'),
                                                    backgroundColor: '#CCC',
                                                    series: {
                                                        regions: [{
                                                            attribute: 'fill'
                                                        }]
                                                    }
                                                });

                                                map.series.regions[0].setValues(myCustomColors);
                                            })();
                                        });
                                    </script>
                                    <div id="worldmap" style="height:450px;width:100%;" class="map"></div>


                                </div>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <span class="badge badge-secondary">EU</span>
                                                </a>
                                            </td>
                                            <td>European Union</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <span class="badge badge-primary">NAFTA</span>
                                                </a>
                                            </td>
                                            <td>North American Free Trade Agreement</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <span class="badge badge-success">AL</span>
                                                </a>
                                            </td>
                                            <td>Arab League</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>