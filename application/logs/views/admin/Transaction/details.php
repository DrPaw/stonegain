<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>Username</th>
                                    <td>: <?= $users['user_anme']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: <?= $users['user_email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Instagram</th>
                                    <td>: <?= $users['instagram']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
