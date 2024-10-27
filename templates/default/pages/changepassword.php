<?php
$global->check_logged_in();
$account = new Account($_SESSION['username']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['new_password'] == $_POST['confirm_password']){  // check if new password matches confirmed password
        $change_password_status = $account->change_password($_POST['old_password'], $_POST['new_password']);
        if ($change_password_status == "success") {
            $_SESSION['success_message'] = 'Вы успешно сменили пароль!';
    } else {
        $errorMessage = $_SESSION['error'] ?? 'Пароли не совпалают!';
    } 
    } 

if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
}    
}
?>

<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>
                    <div class="nk-content-body">
                       <div class="nk-content-wrap">
<?php if ($successMessage) : ?>                
        <div class="alert alert-warning">
            <div class="alert-cta flex-wrap flex-md-nowrap">
                <div class="alert-text">
                    <p><?= $successMessage ?></p>
                </div>
            </div>

        </div>
<?php endif; ?> 

<?php if ($errorMessage) : ?>             
<div class="alert alert-fill alert-danger alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em>
                     <?= $errorMessage ?>
            <button class="close" data-dismiss="alert"></button>
</div>
<?php endif; ?> 
                            <div class="nk-block">
    <div class="row g-gs">
        <div class="col-12">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link active"
                       href="?page=changepassword"
                    >
                        <em class="icon ni ni-lock-alt-fill"></em>
                        <span>Сменить пароль</span>
                    </a>
                </li>
               <li class="nav-item">
                    <a class="nav-link"
                        href="/info"
                    >
                        <em class="icon ni ni-activity-round-fill"></em>
                        <span>Активные устройства</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Сменить пароль</h5>
                        </div>
                        <form method="post" action="/changepassword">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="new_password">Старый пароль</label>
                                        <div class="form-control-wrap">
                                            <input type="text" id="old_password" name="old_password" class="form-control" placeholder="Старый пароль" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="new_password">Новый пароль</label>
                                        <div class="form-control-wrap">
                                            <input type="text" id="new_password" name="new_password" class="form-control" placeholder="Новый пароль" aria-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="new_password_confirmation">Повторите новый пароль</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Повторите новый пароль"  aria-required="true">
                                                                                    </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-lg btn-primary ml-auto">Изменить</button> 
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


                    </div>


<?php
include $template_path . 'test/foot.php';
?> 
