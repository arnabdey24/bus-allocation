<?php require APPROOT . '/views/inc/header.php'; ?>


<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<?php flash('form_feedback'); ?>

    <div class="row no-gutters my-4 text-center">
        <div class="container-fluid px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">

            <div class="container">
                <div class="card card0 border-0 mb-3 p-4">
                    <h2 class="text-uppercase">Submit your bus allocation for <?php echo $data['next_date']; ?></h2>
                </div>

                <?php if (empty($data['slots'])): ?>
                    <div class="card card0 border-0 mt-5 p-4">No Schedule Bus Available</div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($data['slots'] as $slot): ?>
                            <div class="col-lg-3 col-md-6">
                                <a class="card card0 border-0 m-3 p-2 btn btn-outline-primary"
                                   href="<?php echo URLROOT; ?>/forms/addSlot/<?php echo $slot->slot_id; ?>">
                                    <h5><?php echo $slot->slot; ?></h5>
                                    <h5><?php echo $slot->start_from; ?></h5>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="container">
                <div class="card card0 border-0 mt-5 mb-3 p-4">
                    <h2 class="text-uppercase">Your allocations on <?php echo $data['next_date']; ?> </h2>
                </div>

                <?php if (empty($data['allocations'])): ?>
                    <div class="card card0 border-0 mt-5 p-4">No Submission Yet</div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($data['allocations'] as $allocation): ?>
                            <div class="col-lg-3 col-md-6" data-toggle="tooltip" data-placement="top"
                                 title="Tooltip on top">
                                <a class="card card0 border-0 m-3 p-2 btn btn-outline-danger"
                                   href="<?php echo URLROOT; ?>/forms/removeAllocation/<?php echo $allocation->allocation_id; ?>">
                                    <h5><?php echo $allocation->slot; ?></h5>
                                    <h5><?php echo $allocation->start_from; ?></h5>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>