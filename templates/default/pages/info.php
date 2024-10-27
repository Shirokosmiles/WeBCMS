
<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>

                    <div class="nk-content-body">
                       <div class="nk-content-wrap">
                            
                                                                                                                                                                                                                                                                                                        

				
                                                                                                                                                                                

<?php $url = $_SERVER["REQUEST_URI"];?>
                                <div class="nk-block">
    <div class="row g-gs">
        <div class="col-12">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link"
                       href="/changepassword"
                    >
                        <em class="icon ni ni-lock-alt-fill"></em>
                        <span>Сменить пароль</span>
                    </a>
                </li>
			   <li class="nav-item">
                    <a class="nav-link active"
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
                        <div class="card-head flex-column align-items-start">
                            <h5 class="card-title m-0">Активные устройства</h5>
                            <div class="nk-block-des">
                                <p>При необходимости вы можете выйти из всех других сеансов браузера на всех ваших устройствах. Текущая информация о аккаунте предоставлена ниже. Если вы считаете, что ваша учетная запись была скомпрометирована, вам также следует обновить пароль.</p>
                            </div>
                        </div>
                        <table class="table table-ulogs">
                            <thead class="thead-light">
                            <tr>
                                <th class="tb-col-os"><span class="overline-title">Браузер <span class="d-sm-none">/ IP</span></span></th>
                                <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                <th class="tb-col-time"><span class="overline-title">Последняя активность</span></th>
                                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                            </tr>
                            </thead>
                            <tbody>
                                                            <tr>
                                    <td class="tb-col-os"><?php

  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Yandex Browser";
  elseif (strpos($user_agent, "Yandex") !== false) $browser = "Yandex";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный";
  echo "$browser";

?></td>
                        <td class="tb-col-ip"><span class="sub-text"><?php echo $_SERVER['SERVER_ADDR'];?></span></td>
						<td class="tb-col-time"><span class="sub-text"><span class="d-none d-sm-inline-block"></span><?= $account->get_last_login(); ?></span></td>
                        <td class="tb-col-action"><span class="badge badge-outline-success">Данное устройство</span></td>
                                </tr>
                                                        </tbody>
                        </table>
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