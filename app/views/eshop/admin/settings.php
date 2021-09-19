<?php $this->view("admin/header", $data); ?>

<?php $this->view("admin/sidebar", $data); ?>

<style type="text/css">
    .details {
        background-color: #eee;
        box-shadow: 0px 0px 10px #aaa;
        width: 100%;
        position: absolute;
        min-height: 100px;
        left: 0px;
        padding: 10px;
        z-index: 2;
    }
</style>

<form method="POST" enctype="multipart/form-data">
    <table class="table table-striped table-advance table-hover">

        <?php if ($type == "socials") : ?>

            <thead>
                <tr>
                    <th>Setting</th>
                    <th>Value</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($settings) && is_array($settings)) : ?>
                    <?php foreach ($settings as $setting) : ?>
                        <tr>
                            <td>
                                <?= ucwords(str_replace("_", " ", $setting->setting)) ?>
                            </td>
                            <td>
                                <input placeholder="<?= ucwords(str_replace("_", " ", $setting->setting)) ?>" name="<?= $setting->setting ?>" class="form-control" type="text" value="<?= $setting->value ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>

            <input type="submit" value="Save Settings" class="btn btn-warning pull-right">

        <?php elseif ($type == "slider_images") : ?>

            <?php if ($action == "show") : ?>

                <thead>
                    <tr>
                        <th>Header 1 Text</th>
                        <th>Header 2 Text</th>
                        <th>Main Message</th>
                        <th>Product Link</th>
                        <th>Product Image</th>
                        <th>Disabled</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (isset($settings) && is_array($settings)) : ?>
                        <?php foreach ($settings as $setting) : ?>
                            <tr>
                                <td>
                                    <?= ucwords(str_replace("_", " ", $setting->setting)) ?>
                                </td>
                                <td>
                                    <input placeholder="<?= ucwords(str_replace("_", " ", $setting->setting)) ?>" name="<?= $setting->setting ?>" class="form-control" type="text" value="<?= $setting->value ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

                <a href="<?= ROOT ?>admin/settings/slider_images?action=add">
                    <input type="button" value="Add Row" class="btn btn-warning pull-right">
                </a>

            <?php elseif ($action == "add") : ?>

                <h2>Add New Row</h2>
                <div class="form-group">
                    <label for="header1_text">Header 1 Text</label>
                    <input autofocus id="header1_text" type="text" class="form-control" name="header1_text" placeholder="" value="<?= isset($POST['header1_text']) ? $POST['header1_text'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="header2_text">Header 2 Text</label>
                    <input id="header2_text" type="text" class="form-control" name="header2_text" placeholder="" value="<?= isset($POST['header2_text']) ? $POST['header2_text'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="text">Main Message</label>
                    <textarea id="text" class="form-control" name="text"><?= isset($POST['text']) ? $POST['text'] : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="link">Content Link</label>
                    <input id="link" type="text" class="form-control" name="link" placeholder="e.g. http://yourwebsite.com/your_product" value="<?= isset($POST['link']) ? $POST['link'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="image">Slider Image</label>
                    <input id="image" type="file" class="form-control" name="image">
                </div>

                <input type="submit" value="Add" class="btn btn-primary pull-right">

            <?php endif; ?>
        <?php endif; ?>

    </table>
</form>

<?php $this->view("admin/footer", $data); ?>