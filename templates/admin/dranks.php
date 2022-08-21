<?php require_once "../../partials/admin/header.php" ?>
<?php require_once "../../logic/admin/dranks.php" ?>


<main>
    <?php 
        if(isset($_GET['success'])){
            echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
        }
    ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dranks</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dranks</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dranks">
                <i class="fa-solid fa-bottle-droplet"></i>
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
                            $drankss = $dranks->show();
                            foreach ($drankss as $dranks) {
                                echo "<tr><td>{$dranks['flavour']}</td><td>{$dranks['large_price']}</td><td>{$dranks['medium_price']}</td><td>{$dranks['small_price']}</td><td><button type='button' class='edit btn btn-warning btn-sm' data-bs-toggle='modal' data-id='".$dranks['id']."' data-bs-target='#dranks-edit'><i class='fa-solid fa-pen-to-square text-white'></i></button>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal  dranks-->
    <div class="modal fade" id="dranks">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dranks">Add Dranks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/dranks.php" method="POST"> 
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <select class="form-select" aria-label="Default select example" name="flavour">
                                <option value="coca cola" selected>coca cola</option>
                                <option value="sprite">sprite</option>
                                <option value="fanta">fanta</option>
                            </select>
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
                        <input type="submit" value="Add" name="dranks" class="btn btn-success">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dranks-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dranks-edit">Edit Dranks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../logic//admin/dranks.php" method="POST"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <select class="form-select" aria-label="Default select example" name="flavour">
                                <option value="coca cola" selected>coca cola</option>
                                <option value="sprite">sprite</option>
                                <option value="fanta">fanta</option>
                            </select>
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
                url: "../../logic//admin/dranks.php",
                data: {id:id, edit:'edit'},
                dataType: 'json',
                success: function(reps){
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