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
            <th>Order no</th>
            <th>Customer</th>
            <th>Order date</th>
            <th>Total</th>
            <th>Delivery address</th>
            <th>City / State</th>
            <th>Phone</th>
            <th>Status</th>
            <th>...</th>
        </tr>
    </thead>

    <tbody onclick="show_details(event)">

        <?php if (isset($orders) && is_array($orders)) : ?>
            <?php foreach ($orders as $order) : ?>
                <tr style="position: relative;">
                    <td>
                        <?= $order->id ?>
                    </td>
                    <td>
                        <a href="<?= ROOT ?>profile/<?= $order->user->url_address ?>">
                            <?= $order->user->name ?>
                        </a>
                    </td>
                    <td>
                        <?= date("jS M Y h:i a", strtotime($order->date)) ?>
                    </td>
                    <td>
                        $<?= $order->total ?>
                    </td>
                    <td>
                        <?= $order->delivery_address ?>
                    </td>
                    <td>
                        <?= $order->state ?>
                    </td>
                    <td>
                        <?= $order->phone ?>
                    </td>
                    <td>
                        <?= is_paid($order) ?>
                    </td>
                    <td>
                        <i class="fa fa-arrow-down"></i>
                        <div class="js-order-details details hide">
                            <a style="float: right; cursor: pointer;">Close</a>

                            <h4>Order #<?= $order->id ?></h4>
                            <h4>Customer: <?= $order->user->name ?></h4>

                            <!-- order details -->
                            <div style="display: flex;">
                                <table class="table" style="flex: 1; margin: 4px;">
                                    <tr>
                                        <th>Country</th>
                                        <td><?= $order->country ?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><?= $order->state ?></td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Address</th>
                                        <td><?= $order->delivery_address ?></td>
                                    </tr>
                                </table>

                                <table class="table" style="flex: 1; margin: 4px;">
                                    <tr>
                                        <th>Phone</th>
                                        <td><?= $order->phone ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td><?= $order->date ?></td>
                                    </tr>
                                    <tr>
                                        <th>...</th>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /order details -->

                            <hr>
                            <h4>Order Summary</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php if (isset($order->details) && is_array($order->details)) : ?>
                                    <?php foreach ($order->details as $detail) : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $detail->qty ?></td>
                                                <td><?= $detail->description ?></td>
                                                <td><?= $detail->amount ?></td>
                                                <td><?= $detail->total ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div>No order details were found for this order.</div>
                                <?php endif; ?>
                            </table>
                            <h4 class="pull-right">Grand Total: <?= $order->grand_total ?></h4>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
            <td colspan="8"><?php Page::show_links(); ?></td>
        </tr>
    </tbody>

</table>

<script type="text/javascript">
    function show_details(e) {

        var row = e.target.parentNode;

        if (row.tagName != "TR")
            row = row.parentNode;

        var details = row.querySelector(".js-order-details");

        // get all rows

        var all = e.currentTarget.querySelectorAll(".js-order-details");

        for (var i = 0; i < all.length; i++) {

            if (all[i] != details) {

                all[i].classList.add("hide");
            }
        }

        if (details.classList.contains("hide")) {

            details.classList.remove("hide");

        } else {

            details.classList.add("hide");
        }
    }
</script>

<?php $this->view("admin/footer", $data); ?>