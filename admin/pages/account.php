<?php
$account = new adminAccounts();
$pageNum = isset($_GET['pg']) ? $_GET['pg'] : 1; // Get the current page number from the URL
$perPage = 20; // Number of accounts to display per page
$accounts = $account->get_accounts($pageNum, $perPage);
?>

<div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"><?= $translations['user'] ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p>A list of users.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
 <!-- .nk-block -->
            <div class="col-12">
                <div class="card card-bordered">

                    <div class="card-inner p-0 border-top">
                        <div class="nk-tb-list nk-tb-ulist is-compact">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">Пользователь</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Баланс</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Роль</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Дата регистрации</span></div>
                                <div class="nk-tb-col tb-col-md" style="width: 350px;"><span class="sub-text"></span></div>
                            </div>
                            <!-- .nk-tb-item -->
                            <?php foreach ($accounts as $user) : ?>
                            <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar xs bg-primary">
                                                <span class="text-uppercase"><?php
                            $userAccount = new Account($user['username']);
                            ?>
                            <img src="<?= $userAccount->get_avatar(); ?>"></span>
                                            </div>
                                            <div class="user-name">
                                                <span class="tb-lead"><?php echo $user['username']; ?></span>
                                                <span><?php echo $user['email']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col"> <span><?php echo $user['bonuses']; ?></span> </div>
                                    <div class="nk-tb-col"> <span>admin</span> </div>
                                    <div class="nk-tb-col tb-col-md"> <span><?php echo $user['joindate']; ?></span> </div>

                                    <div class="nk-tb-col nk-tb-col-tools users-set" style="float: right;justify-content: flex-end;width: 100%;max-width: 350px;">

                                        <div class="coin-set">
                                            <a href="" class="btn btn-sm btn-icon btn-trigger getinfo" title="Информация" data-username="Demo" data-userid="1">
                                                <em class="icon ni ni-info ml-1"></em>
                                            </a>
                                        </div>
                                        <div class="coin-set">
                                            <a href="" class="btn btn-sm btn-icon btn-trigger" title="Склад пользователя" data-username="Demo" data-userid="1">
                                                <em class="icon ni ni-inbox ml-1"></em>
                                            </a>
                                        </div>
                                        <div class="coin-set">
                                            <a href="" class="btn btn-sm btn-icon btn-trigger" title="Логи пользователя" data-username="Demo" data-userid="1">
                                                <em class="icon ni ni-file-docs ml-1"></em>
                                            </a>
                                        </div>
                                        <div class="coin-set">
                                            <a class="btn btn-sm btn-icon btn-trigger setcoin" title="Начислить баланс" data-username="Demo" data-userid="1">
                                                <em class="icon ni ni-coins ml-1"></em>
                                            </a>
                                        </div>
                                        <div class="coin-set">
                                            <a class="btn btn-sm btn-icon btn-trigger setitem" title="Начислить предмет" data-username="Demo" data-userid="1">
                                                <em class="icon ni ni-cart ml-1"></em>
                                            </a>
                                        </div>

                                        <div class="drodown">
                                            <a href="#"
                                               class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown" title="Назначить роль">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Администратор</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Аналитик</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Поддержка</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Пользователь</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                                      
                                                    </div>
                    </div>


                    <div id="popup-balance" class="popup-balance-block">

                        <div class="nk-block">
                            <div class="row g-gs">
                                <div class="col-12">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <h5 class="card-title">
                                                    <span class="mr-2">Изменить баланс пользователю  <span id="u_name"></span></span>
                                                </h5>
                                                <span class="popup-close" onClick="$('#popup-balance').hide();">x</span>
                                            </div>
                                        </div>
                                        <div class="card-inner border-top">
                                            <form action="" method="POST">
                                                <input type="hidden" name="_token" value="4A47pkJfKnO1v3UJEzhTocmZTSbx8Yly4CO9DBk0">                                                <input id="balance_user_id" name="user_id" type="hidden" value="">

                                                <div class="row g-4">
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label class="form-label" for="amount">Введите количество CoL</label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" min="0" step="0.01" class="form-control" id="balance" name="balance"
                                                                       value="0">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Начислить</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="popup-item" class="popup-balance-block">

                        <div class="nk-block">
                            <div class="row g-gs">
                                <div class="col-12">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <h5 class="card-title">
                                                    <span class="mr-2">Выдать предмет пользователю на склад МА <span id="u_name"></span></span>
                                                </h5>
                                                <span class="popup-close" onClick="$('#popup-item').hide();">x</span>
                                            </div>
                                        </div>
                                        <div class="card-inner border-top">
                                            <form action="" method="POST">
                                                <input type="hidden" name="_token" value="4A47pkJfKnO1v3UJEzhTocmZTSbx8Yly4CO9DBk0">                                                <input id="item_user_id" name="user_id" type="hidden" value="">

                                                <div class="row g-4">
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label class="form-label" for="item_id">Введите L2 ID предмета</label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" min="0" class="form-control" id="item_id" name="item_id"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="item_quantity">Введите количество шт.</label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" min="0" class="form-control" id="item_quantity" name="item_quantity"
                                                                       value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Начислить</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card-inner">
                        <nav>
        <ul class="pagination">
        <?php
            $totalAccounts = $account->get_total_accounts();
            $totalPages = ceil($totalAccounts / $perPage);

            if ($pageNum > 1) {
                echo "<li class='page-item'><a class='page-link' href='/admin/account&pg=1'>1</a></li>";
            }

            if ($pageNum > 3) {
                echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
            }

            for ($i = max(2, $pageNum - 1); $i <= min($totalPages - 1, $pageNum + 1); $i++) {
                $isActive = $i == $pageNum ? "active" : "";
                echo "<li class='page-item $isActive'><a class='page-link' href='/admin/account&pg=$i'>$i</a></li>";
            }

            if ($pageNum < $totalPages - 1) {
                if ($pageNum < $totalPages - 2) {
                    echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
                }
                echo "<li class='page-item'><a class='page-link' href='/admin/account&pg=$totalPages'>$totalPages</a></li>";
            }
            ?>
            </ul>
                      </nav>

                    </div>
                </div>
            </div>
<!-- .nk-block -->