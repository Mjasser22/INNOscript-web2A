<?php
include '../CONTROLLER/reservationC.php';
$r=new ReservationC();
include 'Header.php';
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
        <div class="text-body-secondary">
            <span class="h5">All Reservations</span>
            <br>
            Manage all your existing reservations or add a new one
        </div>
        <!-- Bouton pour déclencher le formulaire d'ajout de réservation -->
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddReservation">
            Add new reservation
        </button>
   
<!-- Formulaire d'ajout de réservation -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddReservation" style="width:600px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add new reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <form method="POST" action="../CONTROLLER/reservationC.php?action=insertData" enctype="multipart/form-data" id="insertForm">
   
    <label for="destination_id">Destination ID:</label>
    <input type="text" id="destination_id" name="destination_id" required><br><br>
    
    <label for="user_name">User Name:</label>
    <input type="text" id="user_name" name="user_name" required><br><br>
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" required><br><br>
    
    <label for="check_in_date">Check-in Date:</label>
    <input type="date" id="check_in_date" name="check_in_date" required><br><br>
    
    <label for="check_out_date">Check-out Date:</label>
    <input type="date" id="check_out_date" name="check_out_date" required><br><br>
    
    <label for="accomodation_type">Accomodation Type:</label>
    <input type="text" id="accomodation_type" name="accomodation_type" required><br><br>
    
    <label for="total_price">Total Price:</label>
    <input type="text" id="total_price" name="total_price" required><br><br>
    
    <input type="submit" value="Submit">
    <div>
                <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
</form>
    </div>
</div>

<!-- Conteneur des notifications -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <!-- Notification de succès -->
    <div class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
        <div class="d-flex">
            <div class="toast-body">
                <strong>Success!</strong>
                <span id="successMsg"></span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <!-- Notification d'erreur -->
    <div class="toast align-items-center text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
        <div class="d-flex">
            <div class="toast-body">
                <strong>Error!</strong>
                <span id="errorMsg"></span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php

?>
