<div class="row">
    <div class="span12">
        <h1>Dashboard</h1>
        <h2>Statistics</h2>
    </div>
</div>
<div class="row">
    <div class="span6">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Pirates</th> <td><?= sizeof($registeredUsers) ?></td>
            </tr>
            <tr>
                <th>Total Codes In Database</th> <td><?= sizeof($totalCodesInDatabase) ?></td>
            </tr>
            <tr>
                <th>Total Codes Found</th> <td><?= sizeof($totalFoundCodes) ?></td>
            </tr>
            <tr>
                <th>Average Codes Found Per User</th> <td><?= sizeof($registeredUsers) ?></td>
            </tr>
        </table>
    </div>
</div>