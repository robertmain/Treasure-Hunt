<?php $this->layout('layouts/live') ?>

<div class="alertcontainer"></div>


<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/live.js')) ?>"></script>
<?php $this->end(); ?>
