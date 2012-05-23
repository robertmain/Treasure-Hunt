<table class="table table-bordered table-striped table-condensed"> 
    <thead> 
        <tr> <th>user</th> <th>treasures found</th> <th>joined</th> </tr> 
    </thead> 
    <tbody> 
        <?php foreach ($mytreasures as $Mytreasure): ?>
            <tr> 
            <td><?= $Mytreasure->phone ?></td> 
            <td><?= $Mytreasure->treasures ?></td>
            <td><?= date(FRIENDLYDATEFORMAT, $Mytreasure->signup) ?></td> 
            
            </tr>
        <?php endforeach; ?>
    </tbody> </table>



