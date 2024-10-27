<?php
$global->check_logged_in();
$account = new Account($_SESSION['username']);
if (isset($_POST['change_password'])) 
{
   header("Location: ?page=changepassword");
   exit();
}
?>

<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>

                    <div class="nk-content-body">
                        <div class="nk-content-wrap">
                            
<div class="nk-block">
        <div class="row g-gs">
            <div class="col-sm-4">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-title-group align-start mb-2">
                <div class="card-title">
                    <h6 class="title">Баланс</h6>
                </div>
                <div class="card-tools">
                    <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-sm p-0" data-toggle="dropdown">
                            <em class="icon ni ni-more-h"></em>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-plain">
                                <li><a href="?page=donate"><em class="icon ni ni-plus-c text-success"></em> Пополнить</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                <div class="nk-sale-data">
                    <span class="amount text-primary"><em class="icon ni ni-coins"></em> <?= $account->get_account_currency()['donor_points'] ?> CoL</span>
                </div>
            </div>
        </div>
    </div>
</div>
            <div class="col-sm-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <h6 class="title">Голоса</h6>
                            </div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-sm p-0" data-toggle="dropdown">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="https://l2.wizardcp.com/warehouse">Голосовать</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                            <div class="nk-sale-data">
                                <span class="amount"><em class="icon ni ni-coins"></em> <?= $account->get_account_currency()['vote_points'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <h6 class="title">Characters</h6>
                            </div>
                        </div>
                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                            <div class="nk-sale-data">
                                <span class="amount mt-1">8 <em class="icon ni ni-users"></em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

                        </div>
                        </div>

<?php
include $template_path . 'test/foot.php';
?>  