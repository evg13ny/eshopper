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

<table class="table table-striped table-advance table-hover">

    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php if (isset($messages) && is_array($messages)) : ?>
            <?php foreach ($messages as $message) : ?>
                <tr style="position: relative;">
                    <td>
                        <?= $message->name ?>
                    </td>
                    <td>
                        <?= $message->email ?>
                    </td>
                    <td>
                        <?= $message->subject ?>
                    </td>
                    <td>
                        <?= $message->message ?>
                    </td>
                    <td>
                        <?= date("jS M Y h:i a", strtotime($message->date)) ?>
                    </td>
                    <td>
                        <i class="fa fa-trash-o"></i> Delete
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php $this->view("admin/footer", $data); ?>