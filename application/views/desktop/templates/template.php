<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url() . VIEWPATH . 'desktop/css/style.css') ?>
        <script type="text/javascript" async="async" src="<?= base_url() . VIEWPATH . 'desktop/js/jquery.min.js' ?>"></script>
        <script type="text/javascript" async="async" src="<?= base_url() . VIEWPATH . 'desktop/js/bootstrap.min.js' ?>"></script>
        <title><?= APPTITLE ?></title>
    </head>
    <body>
        <div class="modal fade" id="myModal">
            <div class="modal-header">
                <h3>Add Joe Bloggs As A Friend?</h3>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="span1">
                        <?= img('http://static.classora.com/files/uploads/images/entries/497509/main.jpg', TRUE) ?>
                    </div>
                    <div class="span3">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#1" data-toggle="tab">Friend Request</a></li>
                                <li><a href="#2" data-toggle="tab">Permissions</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="1">
                                    <h4>Friend Request</h4>
                                    <p>You are about to add Joe Bloggs as a friend.</p>
                                    <p>Joe will have to confirm that you are friends</p>
                                </div>
                                <div class="tab-pane" id="2">
                                    <h4>Permissions</h4>
                                    <p>Adding Joe as a friend will allow him to:</p>
                                    <ul>
                                        <li>View your photos</li>
                                        <li>View your videos</li>
                                        <li>Post to your wall</li>
                                        <li>Comment on your posts</li>
                                        <li>Tag you in photos</li>
                                        <li>Find out where you live</li>
                                        <li>Access your bank details</li>
                                        <li>Sleep with your wife</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                <a href="#" class="btn btn-primary">Send Request</a>
                <script type="text/javascript">
                    $("#myModal a.btn-primary").click(function() {
                        $("#myModal").modal('hide');
                        
                    });
                </script>
            </div>
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?= base_url() ?>"><?= APPTITLE ?></a>
                    <?= form_open('search', array('method' => 'get', 'class' => 'navbar-search pull-left')); ?>
                    <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span2 well">
                    <ul class="nav nav-list unstyled">
                        <li class="nav-header">Site Navigation</li>
                        <li><a href=""><i class="icon-home"></i> Home</a></li>
                        <li><a href=""><i class="icon-question-sign"></i> About</a></li>
                        <li><a href=""><i class="icon-envelope"></i> Contact</a></li>
                    </ul>
                    <ul class="nav nav-list unstyled">
                        <li class="nav-header">Admin Menu</li>
                        <li><a href=""><i class="icon-user"></i> User Management</a></li>
                        <li><a href=""><i class="icon-pencil"></i> Page Management</a></li>
                    </ul>
                </div>
                <div class="span5 well">
                    <div class="btn-group pull-right">
                        <a href="#" class="btn" title="Edit Post"><i class="icon-edit"></i> Edit</a>
                        <a href="#" class="btn" title="Delete Post"><i class="icon-trash"></i> Delete</a>
                    </div>
                    <h1>Lorem Ipsum</h1>
                    <span class="label">Posted: <?= date("D dS M Y") ?></span>
                    <article>
                        <p>This template file is located in <?= APPPATH ?>/desktop/templates/template.php</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                        </p>
                    </article>
                </div>
                <div class="span3 well">
                    <h1>About Me</h1>
                    <dl>
                        <dd>
                            <ul class="thumbnails">
                                <li class="span1">
                                    <img src="http://static.classora.com/files/uploads/images/entries/497509/main.jpg" alt="" />
                                </li>
                                <li class="span1">
                                    <img src="http://www.odt.co.nz/files/imagecache/200x200_scaled_cropped/story/2011/05/steve_ballmer_4ddf41fc58.jpg" alt="" />
                                </li>
                            </ul>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing 
                                elit, sed do eiusmod tempor incididunt ut labore et 
                                dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in 
                                reprehenderit in voluptate velit esse cillum dolore 
                                eu fugiat nulla pariatur. Excepteur sint occaecat 
                                cupidatat non proident, sunt in culpa qui officia 
                                deserunt mollit anim id est laborum.
                            </p>
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal" ><i class="icon-plus icon-white"></i><i class="icon-user icon-white"></i> Add Me On Facebook</a>
                        </dd>
                    </dl>
                </div>
            </div>
            <p class="center">
                Copyright <?= date('Y') ?> &copy; <?= APPTITLE ?><br />
                All Rights Reserved
            </p>
        </div>
    </body>
</html>