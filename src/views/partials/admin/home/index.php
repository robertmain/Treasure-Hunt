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
<h3><?= APP_TITLE ?> Activity</h3>
<div id="found_div"></div>
<?php $this->end(); ?>

<?php $this->push('scripts'); ?>
    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load('visualization', '1', { packages:['corechart'] });
        google.setOnLoadCallback(() => {
            const {
                visualization: {
                    arrayToDataTable,
                    LineChart,
                },
            } = google;
            const toTouples = (
                headings = ['Time', 'Count'],
                data = []
            ) => ([
                headings,
                ...data.map(({ key, value }) => ([key, value]))
            ])


            const signUpData = toTouples(
                ['Time', 'Registrations'],
                <?= json_encode($signupData); ?>.map(
                    ({ created_at, signups}) => ({
                        key: new Date(created_at),
                        value: parseInt(signups),
                    })
                )
            );

            const foundData = toTouples(
                ['Time', 'Treasure Found'],
                <?= json_encode($treasureFoundData); ?>.map(
                    ({ created_at, treasure_found }) => ({
                        key: new Date(created_at),
                        value: parseInt(treasure_found),
                    })
                )
            );

            const options = {
                curveType: 'function',
                legend: { position: 'none' }
            }

            new LineChart(document.getElementById('signup_div'))
                .draw(arrayToDataTable(signUpData), {
                    ...options,
                    hAxis:{'title': signUpData[0][0]},
                    vAxis:{'title': signUpData[0][1]},
                });
            new LineChart(document.getElementById('found_div'))
                .draw(arrayToDataTable(foundData), {
                    ...options,
                    hAxis:{'title': foundData[0][0]},
                    vAxis:{'title': foundData[0][1]},
                });
        });
    </script>
<?php $this->end(); ?>
