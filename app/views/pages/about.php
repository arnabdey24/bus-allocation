<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
  .line {
    height: 1px;
    width: 45%;
    background-color: black;
    margin-top: 10px;
  }

  .or {
    width: 10%;
    font-weight: bold;
  }
</style>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/aboutUs.css">

<div class="bg-dark text-light mt-5">
    <div class="container text-center pt-3 pb-3">
        <div class="row">
            <div class="col-sm-12 col-md-12">

                <h4>Description</h4>
                <p>
                    NSTU Student Bus Seat Allocation System is a web-based application. At present there have around seven thousand students present in NSTU campus. Most of them live in the nearest city Maijdee so they have to use university transport in regular basis. But there are not enough transport for them. As a result, most of the time students cannot attend their class in due time. Also, most of them came university by taking high risk of e.g., standing in the bus or hanging on the door.  NSTU Student Bus Seat Allocation System effectively solve above problems and meeting the demands of all the students.
                </p>

                <br>
                <h4>Contact</h4>
                <p>
                    Institute of Information Technology (IIT)<br>
                    Noakhali Science and Technology University
                </p>

                <img src="<?php echo URLROOT; ?>/img/envelope.png" width="20px">
                <a href="mailto:managementsystemschool21@gmail.com">busallocation.system.nstu@gmail.com</a> <br>
                <img src="<?php echo URLROOT; ?>/img/call.png" width="20px">
                <a href="tel:01789103077">01725017282</a>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>