<?php
include '../../../../Controller/voyageCon.php';

$result = isset($_GET['result']) ? $_GET['result'] : null;
$voyageC = new voyageController("voyage");
$id = isset($_POST['id']) ? $_POST['id'] : null;
$voyage = null;
if ($id) {
    $voyage = $voyageC->getVoyage($id);
}
?>



<link rel="stylesheet" href="liste_employe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <center>



<div class="inscription">
                                    <h4 class="inscription">Create Voyage</h4>
                                    <p class="inscription">
                                        Voyage
                                    </p>
                                    <form class="forms-sample" action="../../../../model/update_voy.php" method="POST">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($voyage['id']); ?>">

                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input value="<?= htmlspecialchars($voyage['Name']) ?>" name="Name" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                            <div class="invalid-feedback">Name should not contain numbers.</div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Update Voyage</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.php -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from
                                Bootstrapdash.com</span>
                        </div>
                        </center>
