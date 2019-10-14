<?php $this->layout('layouts/live') ?>

<div class="alertcontainer"></div>
<script type="text/javascript">
    let lastId;
    const treasure = [];

    setInterval(async() => {
        const response = await fetch(`<?= current_url() ?>/socket/${(lastId > 0) ? lastId: ''}`)
        const body = await response.json();

        const newTreasure = body.filter(({ f_id }) =>
            !treasure.map((existing) => existing.f_id).includes(f_id));

        treasure.push(...newTreasure);

        ([{f_id: lastId}] = treasure.slice(-1));

        newTreasure.forEach(({ phone, title, f_id }) => {
            $(`<div><h4 class="alert-heading">
                Treasure Found</h4><p>User: ${phone}<br />
                Found Treasure: ${title}</p></div>`)
                .addClass('alert alert-info span3')
                .hide()
                .prependTo('.alertcontainer')
                .fadeIn(1500);
        });
    }, 2000);
</script>
