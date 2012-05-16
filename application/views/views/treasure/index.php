<h1>My Treasure</h1>

<table class="table table-bordered table-striped table-condensed">
    <tr>
        <th>Title</th> <th></th>
    </tr>
    <?php if (sizeof($myTreasure) > 0): ?>
        <?php foreach ($myTreasure as $Treasure): ?>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>