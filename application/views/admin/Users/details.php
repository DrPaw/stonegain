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
                        <div class="tab-pane active backgroundcolor-white" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>Amount</th>
                                    <td>: <?= $transaction['amount']; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>: <?= $transaction['description']; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>: <?= $transaction['remark']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
