<div class="alertcontainer"></div>
<script type="text/javascript">
    var lastId = 0;
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
                    $('<div class="alert alert-info span3"><h4 class="alert-heading">Treasure Found ' + Found.id + ' </h4><p>User: ' + Found.pirate + ' Found Treasure: ' + Found.title + '</p></div>').hide().appendTo('.alertcontainer').fadeIn('slow');
                    lastId +=1;
                    console.log(response[item]);
                }
            }
        });
    }
    
    setInterval('longPoll()', 100);
</script> 