<?php
$this->layout('layouts/two-one', [
    'title' => 'Dashboard',
]);
?>

<?php $this->start('one'); ?>
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
<?php $this->end(); ?>

<?php $this->start('two'); ?>
<h3>User Registration</h3>
<div id="signup_div"></div>
<?php $this->end(); ?>

<?php $this->start('three'); ?>
<h3><?= APPTITLE ?> Activity</h3>
<div id="found_div"></div>
<?php $this->end(); ?>

<?php $this->push('scripts'); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load('visualization', '1', { packages:['corechart'] });
        google.setOnLoadCallback(() => {
            const { visualization: { arrayToDataTable } } = google;

            const signUpData = arrayToDataTable(<?= signupToGraph($signupData) ?>);
            const foundData = arrayToDataTable(<?= activityToGraph($treasureFoundData) ?>)

            const options = {
                hAxis:{'title': 'Time'},
                curveType: 'function',
                legend: { position: 'none' }
            }

            new google.visualization.LineChart(document.getElementById('signup_div'))
                .draw(signUpData, {
                    ...options,
                    vAxis:{'title': 'Registrations'},
                });
            new google.visualization.LineChart(document.getElementById('found_div'))
                .draw(foundData, {
                    ...options,
                    vAxis:{'title': 'Treasure Found'},
                });
        });
    </script>
<?php $this->end(); ?>
