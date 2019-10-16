<?php $this->layout('layouts/live') ?>

<div class="alertcontainer"></div>

<?php $this->push('scripts'); ?>
<script type="text/javascript">
    let lastId;
    const treasure = [];

    setInterval(async() => {
        const fetchSince = (lastId > 0) ? lastId : '';
        const response = await fetch(`<?= base_url('admin/live/socket/${fetchSince}') ?>`)
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
<?php $this->end(); ?>
