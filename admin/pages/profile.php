<?php
$account = new adminAccounts();
$account = new Account($_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $upload_result = $account->upload_avatar($_FILES['file']);
    echo "<p>$upload_result</p>";
}
?>

<div class="user-profilepic-modal-bg">
    <div class="user-profilepic-modal">
        <h2>Change avatar</h2>
        <p>Upload a new avatar/profile picture.</p>
        <div class="avatar-upload-section">
            <form action="" enctype="multipart/form-data" method="post" id="imagick">
                <div class="fileUpload">
                    <input type="file" name="file" class="upload" id="file" />
                    <input type="submit" name="submit" id="submit" value="Upload">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="user_page">

    <div class="row">

        <div class="user_page">
    <div class="row">
        <div class="avatar">
            <img src="<?php echo $account->get_avatar(); ?>" alt="Аватар пользователя">
        </div>
    </div>
</div>

    </div>

</div>