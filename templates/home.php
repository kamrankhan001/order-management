<?php
    require_once "../partials/header.php";
    require_once "../logic/home.php";
    session_start();
?>

<main>
    <nav class="bg-dark p-3">
        <a href="home.php" class="text-white text-decoration-none fs-3">Order Management</a>
    </nav>
    <?php
        if(isset($_GET['success'])){
            echo "<div class='container my-2'><div class='alert alert-success'>{$_GET['success']}</div></div>";
        }
        if(isset($_GET['error'])){
            echo "<div class='container my-2'><div class='alert alert-danger'>{$_GET['error']}</div></div>";
        }
    ?>
    <div class="px-4 my-3 text-white">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Pizza
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="#" method="POST" id="pizzaform">
                                    <input type="hidden" name="pizza">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="qty" class="form-label">Flavour's</label>
                                            <select class="form-select form-select-sm" name="flavour" required>
                                                <?php
                                                    $pizzas = $home->pizza();
                                                    foreach ($pizzas as $pizza) {
                                                        echo "<option value='{$pizza['flavour']}'>{$pizza['flavour']}</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="number" name="qty" id="qty" class="form-control" min='1' value="1" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="size" class="form-label">Size</label>
                                            <select class="form-select form-select-sm" name="size" required>
                                                <option value="Large">Large</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Small">Small</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" value="Add" class="btn btn-success btn-sm mt-1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Fries
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="#" method="POST" id="friesform">
                                    <div class="row">
                                        <input type="hidden" name="fries">
                                        <div class="col-6">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="number" name="qty" id="qty" class="form-control" min='1' value="1" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="size" class="form-label">Size</label>
                                            <select class="form-select form-select-sm" name="size" required>
                                                <option value="Large">Large</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Small">Small</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" value="Add" class="btn btn-success btn-sm mt-1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Drank's
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="#" method="POST" id="dranksform">
                                    <input type="hidden" name="dranks">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="qty" class="form-label">Flavour's</label>
                                            <select class="form-select form-select-sm" name="flavour" required>
                                                <?php
                                                    $dranks = $home->dranks();
                                                    foreach ($dranks as $drank) {
                                                        echo "<option value='{$drank['flavour']}'>{$drank['flavour']}</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="number" name="qty" id="qty" class="form-control" min='1' value="1" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="size" class="form-label">Size</label>
                                            <select class="form-select form-select-sm" name="size" required>
                                                <option value="1.5">1.5</option>
                                                <option value="2.5">2.5</option>
                                                <option value="1\2">1\2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" value="Add" class="btn btn-success btn-sm mt-1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-8 col-12 overflow-auto"  style="max-height: 100vh;">
                <table class="table table-bordered">
                    <thead class="text-center table-dark">
                        <tr>
                            <th>Meal</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="row">
                        
                    </tbody>
                    <tfoot>
                        <td colspan="3" class="fs-4">Total</td>
                        <td id="total_price"></td>
                    </tfoot>
                </table>
                <div class="text-end">
                    <form action="../logic/ajax.php" method="POST">
                        <button class="btn btn-success" name="order" type="submit" id="place-order">Place</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



<?php require_once "../partials/footer.php" ?>