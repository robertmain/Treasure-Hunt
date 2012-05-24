<div class="alertcontainer"></div>
<script type="text/javascript">
    var lastId = 0;
    $.ajax({
        url: '<?= site_url('admin/live/socket') ?>',
        type:'GET',
        dataType:'json',
        error: function(jqXHR, error, errorThrown) {
            console.log(jqXHR.status + ' ' +errorThrown);
        },
        success: function(response) {
            for (item in response){
                var Found = response[item];
                $('<div class="alert alert-info span3"><h4 class="alert-heading">Treasure Found</h4><p>User: ' + Found.phone + ' Found Treasure: ' + Found.title + '</p></div>').hide().prependTo('.alertcontainer').fadeIn(1500);
                lastId = Found.f_id ++;
                lastId ++;
            }
        }
    });
    function longPoll(){
        $.ajax({
            url: '<?= site_url('admin/live/socket') ?>/' + lastId,
            type:'GET',
            dataType:'json',
            error: function(jqXHR, error, errorThrown) {
                console.log(jqXHR.status + ' ' +errorThrown);
            },
            success: function(response) {
                
                for (item in response){
                    var Found = response[item];
                    $('<div class="alert alert-info span3"><h4 class="alert-heading">Treasure Found</h4><p>User: ' + Found.phone + ' Found Treasure: ' + Found.title + '</p></div>').hide().prependTo('.alertcontainer').fadeIn(1500);
                    lastId = Found.f_id;
                }
            }
        });
    }
    setInterval(longPoll, 1000);
</script> 