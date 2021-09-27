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

    <?php if ($mode == "read") : ?>
        <a href="<?= ROOT ?>admin/blogs?add_new=true">
            <input type="button" class="btn btn-warning pull-right" value="Add New Post">
        </a>
        <thead>
            <tr>
                <th>Title</th>
                <th>Owner</th>
                <th>Post</th>
                <th>Image</th>
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
                            <a href="<?= ROOT ?>admin/messages?delete=<?= $message->id ?>">
                                <i class="fa fa-trash-o"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>

    <?php elseif ($mode == "add_new") : ?>
        <?php if (isset($errors)) : ?>
            <div class="status alert alert-danger"><?= $errors ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Post Title</label>
            <input id="title" type="text" name="title" class="form-control" value="<?= isset($POST['title']) ? $POST['title'] : '' ?>"><br>

            <label for="image">Post Image</label>
            <input id="image" type="file" name="image" class="form-control"><br>

            <label for="post">Post Text</label>
            <textarea id="post" name="post" class="form-control"><?= isset($POST['post']) ? $POST['post'] : '' ?></textarea><br>

            <input type="submit" value="Post" class="btn btn-success pull-right">
        </form>

    <?php elseif ($mode == "delete_confirmed") : ?>
        <div class="status alert alert-success">Message was deleted successfully!</div>
        <a href="<?= ROOT ?>admin/messages">
            <input type="button" class="btn btn-success pull-right" value="Back to messages">
        </a>

    <?php elseif ($mode == "delete" && is_object($messages)) : ?>
        <div class="status alert alert-danger">Are you sure you want to delete this message??</div>
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
            <tr style="position: relative;">
                <td>
                    <?= $messages->name ?>
                </td>
                <td>
                    <?= $messages->email ?>
                </td>
                <td>
                    <?= $messages->subject ?>
                </td>
                <td>
                    <?= $messages->message ?>
                </td>
                <td>
                    <?= date("jS M Y h:i a", strtotime($messages->date)) ?>
                </td>
            </tr>
            <a href="<?= ROOT ?>admin/messages?delete_confirmed=<?= $messages->id ?>">
                <input type="button" class="btn btn-warning pull-right" value="Delete">
            </a>
        </tbody>
    <?php endif; ?>

</table>

<?php $this->view("admin/footer", $data); ?>