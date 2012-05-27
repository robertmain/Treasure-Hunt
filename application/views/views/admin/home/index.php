<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="row">
    <div class="span12">
        <h1>Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="span6">
        <h3>Overview</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Pirates</th> <td><?= sizeof($registeredUsers) ?></td>
            </tr>
            <tr>
                <th>Total Codes In Database</th> <td><?= sizeof($totalCodesInDatabase) ?></td>
            </tr>
            <tr>
                <th>Average Codes Found Per Pirate</th> <td><?= sizeof($treasure_per_pirate) ?></td>
            </tr>
            <tr>
                <th>Total Codes Found</th> <td><?= sizeof($totalFoundCodes) ?></td>
            </tr>
        </table>
    </div>
    <div class="span6">
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Time', 'Sign-Ups'],
                    ['2004',  1000],
                    ['2005',  1170],
                    ['2006',  660],
                    ['2007',  1030]
                ]);
                var options = {
                    legend:{position: 'none'},
                    vAxis:{'title': 'Sign Ups'},
                    hAxis:{'title': 'Time'}
                };
                var chart = new google.visualization.LineChart(document.getElementById('signup_div'));
                chart.draw(data, options);
            }
        </script>
        <h3>User Registration</h3>
        <div id="signup_div"></div>
    </div>
</div>
<div class="row">
    <div class="span12">
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable(
<?= activityToGraph($analytics) ?>
    );
                
        var options = {
            legend:{position: 'none'},
            vAxis:{'title': 'Treasure Found'},
            hAxis:{'title': 'Time'}
        };
        var chart = new google.visualization.LineChart(document.getElementById('found_div'));
        chart.draw(data, options);
    }
        </script>
        <h3><?= APPTITLE ?> Activity</h3>
        <?php if (sizeof($analytics) > 0): ?>
            <div id="found_div"></div>
        <?php else: ?>
            <p class="center"><em>No Data</em></p>
        <?php endif; ?>
    </div>
</div>
