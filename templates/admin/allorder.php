<?php require_once "../../partials/admin/header.php" ?>
<?php require_once "../../logic/admin/orders.php" ?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Order</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Order</li>
        </ol>
        <div class="card">
            <div class="card-header">
                All Orders
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <th>Order</th>
                        <th>Total Price</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
                        <?php
                            $orderss = $orders->show();
                            foreach ($orderss as $order) {
                                echo "<tr><td>{$order['order_done']}</td><td>{$order['total']}</td><td>{$order['created_at']}</td>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</main>


<?php require_once "../../partials/admin/footer.php" ?>