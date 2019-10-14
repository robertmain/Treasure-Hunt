<?php $this->layout('layouts/default'); ?>

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
        <h3>User Registration</h3>
        <?php if (sizeof(@$signupData) > 0) : ?>
            <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?= signupToGraph($signupData) ?>);
                    var options = {
                        vAxis:{'title': 'Treasure Found'},
                        hAxis:{'title': 'Time'},
                        curveType: 'function'
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('signup_div'));
                    chart.draw(data, options);
                }
            </script>
            <div id="signup_div"></div>
        <?php else : ?>
            <div><p class="center"><em>No Data</em></p></div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <h3><?= APPTITLE ?> Activity</h3>
        <?php if (sizeof(@$treasureFoundData) > 0) : ?>
            <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?= activityToGraph($treasureFoundData) ?>);
                    var options = {
                        vAxis:{'title': 'Treasure Found'},
                        hAxis:{'title': 'Time'},
                        curveType: 'function'
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('found_div'));
                    chart.draw(data, options);
                }
            </script>
            <div id="found_div"></div>
        <?php else : ?>
            <p class="center"><em>No Data</em></p>
        <?php endif; ?>
    </div>
</div>
