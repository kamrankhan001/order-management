<?php require_once "../../partials/admin/header.php" ?>
<?php require_once "../../logic/admin/fries.php" ?>


<main>
    <?php 
        if(isset($_GET['success'])){
            echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
        }
    ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Fries</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Fries</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fries">
                <i class="fa-regular fa-lines-leaning"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <th>Large Price</th>
                        <th>Medium Price</th>
                        <th>Small Price</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                            $friess = $fries->show();
                            foreach ($friess as $fries) {
                                echo "<tr><td>{$fries['large_price']}</td><td>{$fries['medium_price']}</td><td>{$fries['small_price']}</td><td><button type='button' class='edit btn btn-warning btn-sm' data-bs-toggle='modal' data-id='".$fries['id']."' data-bs-target='#fries-edit'><i class='fa-solid fa-pen-to-square text-white'></i></button>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal  Fries-->
    <div class="modal fade" id="fries">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pizza">Add Fries</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/fries.php" method="POST"> 
                    <div class="modal-body">
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
                        <input type="submit" value="Add" name="fries" class="btn btn-success">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fries-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fries-edit">Edit Fries</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/fries.php" method="POST"> 
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
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
                url: "../../logic//admin/fries.php",
                data: {id:id, edit:'edit'},
                dataType: 'json',
                success: function(reps){
                    $("#large-price-edit").val(reps[0]['large_price']);
                    $("#medium-price-edit").val(reps[0]['medium_price']);
                    $("#small-price-edit").val(reps[0]['small_price']);
                    $("#id").val(reps[0]['id']);
                },
                error: function(reps){
                    console.log(reps)
                }

            });
        });

    })
</script>


<?php require_once "../../partials/admin/footer.php" ?>