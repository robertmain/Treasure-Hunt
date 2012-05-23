<?php for ($i = 0; $i <= 17; $i++): ?>
    <div class="alert alert-info span3">
        <h4 class="alert-info">Treasure Found</h4>    
        <p>User: <?= hash('md5', $i) ?> Found Treasure: Steve Jobs</p>
    </div>
<?php endfor; ?>