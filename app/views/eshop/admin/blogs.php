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
            <?php if (isset($blogs) && is_array($blogs)) : ?>
                <?php foreach ($blogs as $blog) : ?>
                    <tr style="position: relative;">
                        <td>
                            <?= $blog->title ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>profile/<?= $blog->user_url ?>">
                                <?= $blog->user_data->name ?>
                            </a>
                        </td>
                        <td>
                            <?= $blog->post ?>
                        </td>
                        <td>
                            <img src="<?= ROOT . $blog->image ?>" style="width: 75px;">
                        </td>
                        <td>
                            <?= date("jS M Y h:i a", strtotime($blog->date)) ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>admin/blogs?edit=<?= $blog->url_address ?>">
                                <i class="fa fa-pencil"></i> Edit |
                            </a>
                            <a href="<?= ROOT ?>admin/blogs?delete=<?= $blog->url_address ?>">
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

        <h4>Add New Post</h4>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Post Title</label>
            <input id="title" type="text" name="title" class="form-control" value="<?= isset($POST['title']) ? $POST['title'] : '' ?>"><br>

            <label for="image">Post Image</label>
            <input id="image" type="file" name="image" class="form-control"><br>

            <label for="post">Post Text</label>
            <textarea id="post" name="post" class="form-control"><?= isset($POST['post']) ? $POST['post'] : '' ?></textarea><br>

            <input type="submit" value="Post" class="btn btn-success pull-right">
        </form>

    <?php elseif ($mode == "edit") : ?>
        <?php if (isset($errors)) : ?>
            <div class="status alert alert-danger"><?= $errors ?></div>
        <?php endif; ?>

        <h4>Edit Post</h4>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Post Title</label>
            <input id="title" type="text" name="title" class="form-control" value="<?= isset($POST['title']) ? $POST['title'] : '' ?>"><br>

            <label for="image">Post Image</label>
            <input id="image" type="file" name="image" class="form-control">
            <input type="hidden" name="url_address" value="<?= isset($POST['url_address']) ? $POST['url_address'] : '' ?>"><br>

            <label for="post">Post Text</label>
            <textarea id="post" name="post" class="form-control"><?= isset($POST['post']) ? $POST['post'] : '' ?></textarea><br>

            <input type="submit" value="Save" class="btn btn-success pull-right">
            <hr>

            <img src="<?= ROOT ?><?= isset($POST['image']) ? $POST['image'] : '' ?>" style="width: 150px;">
        </form>

    <?php elseif ($mode == "delete_confirmed") : ?>
        <div class="status alert alert-success">Post was deleted successfully!</div>
        <a href="<?= ROOT ?>admin/blogs">
            <input type="button" class="btn btn-success pull-right" value="Back to posts">
        </a>

    <?php elseif ($mode == "delete" && is_object($blogs)) : ?>
        <div class="status alert alert-danger">Are you sure you want to delete this post??</div>
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
            <tr style="position: relative;">
                <td>
                    <?= $blogs->title ?>
                </td>
                <td>
                    <a href="<?= ROOT ?>profile/<?= $blogs->user_url ?>">
                        <?= $blogs->user_data->name ?>
                    </a>
                </td>
                <td>
                    <?= $blogs->post ?>
                </td>
                <td>
                    <img src="<?= ROOT . $blogs->image ?>" style="width: 75px;">
                </td>
                <td>
                    <?= date("jS M Y h:i a", strtotime($blogs->date)) ?>
                </td>
                <td>
                    <a href="<?= ROOT ?>admin/blogs?edit=<?= $blogs->url_address ?>">
                        <i class="fa fa-pencil"></i> Edit |
                    </a>
                    <a href="<?= ROOT ?>admin/blogs?delete=<?= $blogs->url_address ?>">
                        <i class="fa fa-trash-o"></i> Delete
                    </a>
                </td>
            </tr>
            <a href="<?= ROOT ?>admin/blogs?delete_confirmed=<?= $blogs->url_address ?>">
                <input type="button" class="btn btn-warning pull-right" value="Delete">
            </a>
        </tbody>
    <?php endif; ?>

</table>

<?php $this->view("admin/footer", $data); ?>