<?php
if (isset($_POST['submit'])) {
    $news = new News();
    $news->add_news($_POST['news-title'], $_POST['news-content'], $_POST['news-url'], $_FILES['file'], $_SESSION['username']);
}

if (isset($_POST['edit-submit'])) {
    $news = new News();
    $news->update_news($_POST['news-id'], $_POST['news-title'], $_POST['news-content']);
}

$news = new News();
?>


    <div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2><?= $translations['news'] ?></h2>
        </div>
 <form id="news-form" method="post" action="" enctype="multipart/form-data">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="title_ru">Заголовок (ru)</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="news-title" name="news-title">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="news-content">Содержание (ru)</label>
                                        <div class="form-control-wrap">
                                                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="url_ru">Ссылка на полную новость (ru)</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="news-url" name="news-url">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image" class="form-label"> Изображение </label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input class="custom-file-input" type="file" name="file" id="file">
                                                <label class="custom-file-label" for="image">Изображение</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="c-button" form="news-form" id="submit" name="submit">Отправить</button>
                                    </div>
                                </div>
                            </div>

                        </form>
      </div>
    </div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/medium-editor@5.23.3/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/medium-editor@5.23.3/dist/css/themes/default.min.css">

<script src="https://cdn.jsdelivr.net/npm/medium-editor@5.23.3/dist/js/medium-editor.min.js"></script>

<script>
    var editor = new MediumEditor('#news-content', {
        toolbar: {
            buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3'],
            static: true,
            sticky: true
        },
        placeholder: {
            text: 'Начните печатать здесь...'
        }
    });

    document.getElementById('news-form').onsubmit = function() {
        var content = editor.getContent();
        document.getElementById('news-content').value = content;
    }
</script>
