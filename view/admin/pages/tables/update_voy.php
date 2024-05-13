<?php
include '../../../../Controller/voyageCon.php';
include '../../../../Controller/categoryCon.php';
$categoryC = new CategoryController("category");
$categories = $categoryC->listCategories();

$result = isset($_GET['result']) ? $_GET['result'] : null;
$voyageC = new voyageController("voyage");
$id = isset($_POST['id']) ? $_POST['id'] : null;
$voyage = null;
if ($id) {
    $voyage = $voyageC->getVoyage($id);
}
?>
 <link rel="stylesheet" href="voyage.css">
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
                                            <label for="exampleInputName1">Titre</label>
                                            <input value="<?= htmlspecialchars($voyage['titre']) ?>" name="titre" type="text" class="form-control" id="exampleInputName1" placeholder="Titre">
                                            <div class="invalid-feedback">Titre should not contain numbers.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Date</label>
                                            <input value="<?= htmlspecialchars($voyage['population']) ?>" name="population" type="date" class="form-control" id="exampleInputEmail3" placeholder="Population">
                                            <div class="invalid-feedback">Population should contain only numbers.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputprice">Price</label>
                                            <input value="<?= htmlspecialchars($voyage['price']) ?>" name="price" type="text" class="form-control" id="exampleInputprice" placeholder="Price">
                                            <div class="invalid-feedback">Price should contain only numbers.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Country</label>
                                            <select name="country" class="form-control" id="exampleSelectGender">
                                                <option value="">Choose...</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="England">England</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Image Upload</label>
                                            <!-- Display current image if available -->
                                            <?php if ($voyage['path_image']) : ?>
                                                <img src="../../../../path/to/images/<?= $voyage['path_image'] ?>" alt="Current Image" style="max-height: 100px;">
                                            <?php endif; ?>
                                            <input type="file" name="path_image" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputCity1">Continent</label>
                                            <input value="<?= htmlspecialchars($voyage['continent']) ?>" name="continent" type="text" class="form-control" id="exampleInputCity1" placeholder="Continent">
                                            <div class="invalid-feedback">Continent should not contain numbers.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"><?= htmlspecialchars($voyage['description']) ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="category" id="">
                                                <option value="">Choose...</option>
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= htmlspecialchars($category['id']); ?>"><?= htmlspecialchars($category['name']); ?></option>

                                                <?php endforeach; ?>
                                            </select>
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
                   
</body>
</center>


</html>