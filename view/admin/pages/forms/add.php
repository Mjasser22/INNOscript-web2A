<?php

include '../../../../Controller/categoryCon.php';
$categoryC = new CategoryController("category");
$categories = $categoryC->listCategories();

$result = isset($_GET['result']) ? $_GET['result'] : null;
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
                  <form class="forms-sample" action="../../../../model/create_voyage.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Titre</label>
                      <input name="titre" type="text" class="form-control" id="exampleInputName1" placeholder="Titre">
                      <div class="invalid-feedback">Titre should not contain numbers.</div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">date</label>
                      <input name="population" type="date" class="form-control" id="" placeholder="">
                      <div class="invalid-feedback">Population should contain only numbers.</div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputprice">Price</label>
                      <input name="price" type="price" class="form-control" id="exampleInputprice" placeholder="Price">
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
                      <label>image upload</label>
                      <input type="file" name="path_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input name="path_image" type="text" class="form-control file-upload-info" enabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Continent</label>
                      <input name="continent" type="text" class="form-control" id="exampleInputCity1" placeholder="Continent">
                      <div class="invalid-feedback">Continent should not contain numbers.</div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium w-100  auth-form-btn">Create Voyage/button>
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
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../js/file-upload.js"></script>
    <script src="../../js/typeahead.js"></script>
    <script src="../../js/select2.js"></script>
    <script>document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.forms-sample');
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const titre = document.getElementById('exampleInputName1');
        const price = document.getElementById('exampleInputprice');
        const continent = document.getElementById('exampleInputCity1');

        // Validate Title: Should not contain numbers
        if (/\d/.test(titre.value)) {
            displayFeedback(titre, 'Titre should not contain numbers.');
            isValid = false;
        } else {
            clearFeedback(titre);
        }

        // Validate Price: Should contain only numbers
        if (!/^\d+(\.\d+)?$/.test(price.value)) {
            displayFeedback(price, 'Price should contain only numbers.');
            isValid = false;
        } else {
            clearFeedback(price);
        }

        // Validate Continent: Should not contain numbers
        if (/\d/.test(continent.value)) {
            displayFeedback(continent, 'Continent should not contain numbers.');
            isValid = false;
        } else {
            clearFeedback(continent);
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    function displayFeedback(element, message) {
        const feedbackElement = element.nextElementSibling;
        feedbackElement.textContent = message;
        feedbackElement.style.display = 'block';
    }

    function clearFeedback(element) {
        const feedbackElement = element.nextElementSibling;
        feedbackElement.textContent = '';
        feedbackElement.style.display = 'none';
    }
});
</script>
    <!-- End custom js for this page-->
</body>

</html>


</center>
