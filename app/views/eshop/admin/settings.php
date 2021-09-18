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

<form method="POST">
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

        <?php endif; ?>

    </table>

</form>

<?php $this->view("admin/footer", $data); ?>