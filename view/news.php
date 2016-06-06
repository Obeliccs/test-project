<div class="head-line">
    <h3>СОздание новости</h3>
    <div class="clear"></div>
</div>
<form class="form-group" method="POST">
    <div class="form-group <?php echo (!empty($errors['From_name']) ? ' error' : '')?>">
        <label class="help-block" for="news-From_name">
            Имя отправителя:
        </label>
        <div class="form-group">
            <input class="form-control" id="news-From_name" type="text" name="news[From_name]" value="<?php echo $row['From_name']?>" />
            <?php if(!empty($errors['From_name'])):?>
                <div class="alert alert-error span5 field-notify">
                    <?php echo $errors['From_name'];?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="form-group <?php echo (!empty($errors['From_email']) ? ' error' : '')?>">
        <label class="help-block" for="news-From_email">
            Email отправителя:
        </label>
        <div class="form-group">
            <input class="form-control" id="news-From_email" type="text" name="news[From_email]" value="<?php echo $row['From_email']?>" />
            <?php if(!empty($errors['From_email'])):?>
                <div class="alert alert-error span5 field-notify">
                    <?php echo $errors['From_email'];?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="form-group">
        <label class="help-block" for="news-News_content">
            Контент:
        </label>
        <div class="form-control">
            <textarea class="form-control" id="news-News_content" type="text" rows="5" name="news[News_content]"><?php echo $row['News_content']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="help-block" for="news-Subject">
            Тема:
        </label>
        <div class="form-control">
            <textarea class="form-control" id="news-Subject" type="text" name="news[Subject]"><?php echo $row['Subject']?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="form-control">
            <input type="submit" value="Сохранить" class="btn btn-default" mame="save">
            <a href="/index.php" class="btn btn-danger">Отмена</a>
        </div>
    </div>
</form>