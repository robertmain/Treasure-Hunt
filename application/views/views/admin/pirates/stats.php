<h1>Pirate Statistics</h1>
<table class="table table-bordered table-striped"> 
    <thead> 
        <tr> <th>Pirate</th> <th>Treasure Found</th> <th>Joined</th> </tr> 
    </thead> 
    <tbody> 
        <?php foreach ($mytreasures as $Mytreasure): ?>
            <tr> 
                <td><?= $Mytreasure->phone ?></td> 
                <td><?= $Mytreasure->treasures ?></td>
                <td><?= date(FRIENDLYDATEFORMAT, $Mytreasure->signup) ?></td> 

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



