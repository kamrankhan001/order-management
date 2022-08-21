<?php require_once "../../partials/admin/header.php" ?>
<?php require_once "../../logic/admin/pizza.php" ?>


<main>
    <?php 
        if(isset($_GET['success'])){
            echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
        }
    ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pizza</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pizza</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pizza">
                    <i class="fa-solid fa-pizza-slice"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <th>Flavour</th>
                        <th>Large Price</th>
                        <th>Medium Price</th>
                        <th>Small Price</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                            $pizzas = $pizza->show();
                            foreach ($pizzas as $pizza) {
                                echo "<tr><td>{$pizza['flavour']}</td><td>{$pizza['large_price']}</td><td>{$pizza['medium_price']}</td><td>{$pizza['small_price']}</td><td><button type='button' class='edit btn btn-warning btn-sm' data-bs-toggle='modal' data-id='".$pizza['id']."' data-bs-target='#pizza-edit'><i class='fa-solid fa-pen-to-square text-white'></i></button>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal  Pizza Edit-->
    <div class="modal fade" id="pizza">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pizza">Add New Pizza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/pizza.php" method="POST"> 
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="flavour" class="form-label">Flavour</label>
                            <input type="text" class="form-control" name="flavour" id="flavour" placeholder="Flavour">
                        </div>
                        <div class="mb-3">
                            <label for="large_price" class="form-label">Large Price</label>
                            <input type="text" class="form-control" name="large_price" id="large_price" placeholder="Large Price">
                        </div>
                        <div class="mb-3">
                            <label for="medium_price" class="form-label">Medium Price</label>
                            <input type="text" class="form-control" name="medium_price" id="medium_price" placeholder="Medium Price">
                        </div>
                        <div class="mb-3">
                            <label for="small_price" class="form-label">Small Price</label>
                            <input type="text" class="form-control" name="small_price" id="small_price" placeholder="Small Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Add" name="pizza" class="btn btn-success">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pizza-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pizza-edit">Edit Pizza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/pizza.php" method="POST"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="flavour" class="form-label">Flavour</label>
                            <input type="text" class="form-control" name="flavour" id="edit-flavour" placeholder="Flavour">
                        </div>
                        <div class="mb-3">
                            <label for="large_price" class="form-label">Large Price</label>
                            <input type="text" class="form-control" name="large_price" id="large-price-edit" placeholder="Large Price">
                        </div>
                        <div class="mb-3">
                            <label for="medium_price" class="form-label">Medium Price</label>
                            <input type="text" class="form-control" name="medium_price" id="medium-price-edit" placeholder="Medium Price">
                        </div>
                        <div class="mb-3">
                            <label for="small_price" class="form-label">Small Price</label>
                            <input type="text" class="form-control" name="small_price" id="small-price-edit" placeholder="Small Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Add" name="update" class="btn btn-success">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script>
    $(document).ready(function(){

        $(document).on("click", ".edit", function () {
            var id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "../../logic//admin/pizza.php",
                data: {id:id, edit:'edit'},
                dataType: 'json',
                success: function(reps){
                    $("#edit-flavour").val(reps[0]['flavour']);
                    $("#large-price-edit").val(reps[0]['large_price']);
                    $("#medium-price-edit").val(reps[0]['medium_price']);
                    $("#small-price-edit").val(reps[0]['small_price']);
                },
                error: function(reps){
                    console.log(reps)
                }
                
            });
            $(".modal-body #id").val(id);
        });

    })
</script>

<?php require_once "../../partials/admin/footer.php" ?>
