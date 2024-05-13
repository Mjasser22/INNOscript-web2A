<?php
include '../../../../Controller/voyageCon.php';
include '../../../../Controller/categoryCon.php';

$voyageC = new VoyageController("voyage");
$voyages = $voyageC->listVoyages();

$categoryC = new CategoryController('category');

$result = isset($_GET['result']) ? $_GET['result'] : null;
?>
  <link rel="stylesheet" href="liste_employe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <center>

  <div class="col-lg-12 grid-margin stretch-card">
              <div class="inscription">
                <div class="inscription">
                  <h4 class="inscription">Check Voyage</h4>

                  <div class="table-responsive">
                    <table id="myTable" class="table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Titre</th>
                          <th>Description</th>
                          <th>Country</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Continent</th>
                          <th>Category</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($voyages as $voyage) : ?>
                          <?php
                          // Assuming you have a method getCategory in your CategoryController
                          $category = $categoryC->getCategory($voyage['id_category']);
                          ?>
                          <tr>
                            <td><?= htmlspecialchars($voyage['id']); ?></td>
                            <td><?= htmlspecialchars($voyage['titre']); ?></td>
                            <td><?= htmlspecialchars($voyage['description']); ?></td>
                            <td><?= htmlspecialchars($voyage['Country']); ?></td>
                            <td><?= htmlspecialchars($voyage['price']); ?></td>
                            <td><?= htmlspecialchars($voyage['population']); ?></td>
                            <td><?= htmlspecialchars($voyage['continent']); ?></td>
                            <td><?= $category ? htmlspecialchars($category['name']) : 'N/A'; ?></td>
                            <td>
                              <!-- Update Form -->
                              <form action="update_voy.php" method="POST">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($voyage['id']); ?>">
                                <button class="badge badge-primary" type="submit">Update</button>
                              </form>
                            </td>
                            <td>
                              <!-- Delete Form -->
                              <form action="../../../../model/delete_voyage.php" method="POST">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($voyage['id']); ?>">
                                <button class="badge badge-danger" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>





          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->

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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</center>

</html>