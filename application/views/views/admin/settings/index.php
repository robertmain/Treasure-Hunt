<h1>Application Settings</h1>

<ul class="nav nav-tabs settings-tabs">
    <li><a href="#validation" data-toggle="tab">Account Validation</a></li>
    <li><a href="#completion" data-toggle="tab">Treasure Hunt Completion</a></li>
    <li><a href="#eucookiecompliancy" data-toggle="tab">EU Cookie Law Compliancy</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade" id="validation">
        <h3>Account Validation</h3>
        <p>The system can require users to validate their account by contacting a member of staff. To turn this on or off use the button below</p>
        <div class="btn-group" data-toggle="buttons-radio">
            <?php
            if ($config[0]->value == '1') {
                $validationButtons['on'] = 'active';
                $validationButtons['off'] = NULL;
            }
            else {
                $validationButtons['on'] = NULL;
                $validationButtons['off'] = 'active';
            }
            ?>
            <button data-status="1" class="btn btn-success authorisation <?= $validationButtons['on'] ?>"><i class="icon-white icon-lock"></i> Authorisation On</button>
            <button data-status="0" class="btn btn-success authorisation <?= $validationButtons['off'] ?>">Authorisation Off</button>
        </div>
    </div>
    <div class="tab-pane fade" id="completion">
        <div class="row">
            <div class="span6">
                <h3>Treasure Hunt Completion</h3>
                <p>
                    You can customise the message that will be shown to the user when they complete the treasure hunt and find all the codes. 
                    See the table on the right for automatic variable substitutions
                </p>
                <form action="#" class="form-horizontal">
                    <div class="control-group">
                        <label for="completetitle" class="control-label">Title</label>
                        <div class="controls">
                            <?= form_input('completetitle', $config[1]->value, 'class="completetitle"') ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="completemessage" class="control-label">Message</label>
                        <div class="controls">
                            <div class="input completemessage span4" name="completemessage" contenteditable="true"><?= $config[2]->value ?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="button" class="btn btn-primary updatemessage"><i class="icon-white icon-refresh"></i> Update Finish Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="span6">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Variable</th><th>Replacement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>%TEAMNAME</td> <td><?= TEAMNAME ?></td>
                        </tr>
                        <tr>
                            <td>%NCODES</td> <td>Number of QR Codes in the database (currently <?= $amountoftreasure ?>)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="dropdown1">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
    </div>
    <div class="tab-pane fade" id="eucookiecompliancy">
        <h3>EU Cookie Law Compliancy</h3>
        <p>Should the application comply with EU Cookie law and ask permission to use cookies?</p>
        <div class="btn-group" data-toggle="buttons-radio">
            <?php
            if ($config[3]->value == '1') {
                $cookielawbutton['on'] = 'active';
                $cookielawbutton['off'] = NULL;
            }
            else {
                $cookielawbutton['on'] = NULL;
                $cookielawbutton['off'] = 'active';
            }
            ?>
            <button data-status="1" class="btn btn-success eucookielaw <?= $cookielawbutton['on'] ?>"><i class="icon-white icon-cog"></i> Cookie Compliancy On</button>
            <button data-status="0" class="btn btn-success eucookielaw <?= $cookielawbutton['off'] ?>">Cookie Compliancy Off</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.settings-tabs a:first').tab('show').addClass('active');
    $('.authorisation').click(function(){
        var pressed = $(this);
        $.ajax({
            url: '<?= site_url('admin/settings/update') ?>',
            type:'POST',
            data: 'key=authorisation&value=' + pressed.attr('data-status') + '&<?= $this->security->get_csrf_token_name() ?>=<?= $this->security->get_csrf_hash() ?>',
            error: function(jqXHR, error, errorThrown) {
                console.log(jqXHR.status + ' ' +errorThrown);
            }
        });
    });
    
    
    $('.updatemessage').click(function(){
        $(this).attr('disabled', 'disabled');
        $.ajax({
            url: '<?= site_url('admin/settings/update') ?>',
            type:'POST',
            data: 'key=completetitle&value=' + $('.completetitle').val() + '&<?= $this->security->get_csrf_token_name() ?>=<?= $this->security->get_csrf_hash() ?>',
            error: function(jqXHR, error, errorThrown) {
                console.log(jqXHR.status + ' ' +errorThrown);
            }
        });
        $.ajax({
            url: '<?= site_url('admin/settings/update') ?>',
            type:'POST',
            data: 'key=completemessage&value=' + $('.completemessage').html() + '&<?= $this->security->get_csrf_token_name() ?>=<?= $this->security->get_csrf_hash() ?>',
            error: function(jqXHR, error, errorThrown) {
                console.log(jqXHR.status + ' ' +errorThrown);
            }
        });
    });
    
    $('.completetitle').keyup(function(){
        $('.updatemessage').removeAttr('disabled');
    });
    
    $('.completemessage').keyup(function(){
        $('.updatemessage').removeAttr('disabled');
    });
    
    $('.eucookielaw').click(function(){
        var pressed = $(this);
        $.ajax({
            url: '<?= site_url('admin/settings/update') ?>',
            type:'POST',
            data: 'key=cookielaw&value=' + pressed.attr('data-status') + '&<?= $this->security->get_csrf_token_name() ?>=<?= $this->security->get_csrf_hash() ?>',
            error: function(jqXHR, error, errorThrown) {
                console.log(jqXHR.status + ' ' +errorThrown);
            }
        });
    });
</script>
