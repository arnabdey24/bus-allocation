<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    .jumbo {
        display: flex;
        justify-content: center;
    }

    .jumbotron {
        text-align: center;
        letter-spacing: 2px;
    }

    .jumbotron p {
        font-size: 20px;
        min-height: 50%;
    }

    #project-ovijog-text {
        font-size: 55px;
        color: #021c6f;
        font-weight: bold;
    }

    #slogan-text {
        font-size: 30px;
    }

    .index-button {
        width: 110px;
        height: 50px;
    }

    @media screen and (max-width: 1000px) {
        #slogan-text {
            margin-bottom: -30px;
        }
    }
</style>

<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

<div id="carouselExampleControls" class="carousel slide p-5" style="max-height: 40%" data-bs-ride="carousel">
    <div class="carousel-inner">


        <div class="carousel-item active">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Sunday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['sun'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="carousel-item ">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Monday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['mon'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="carousel-item ">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Tuesday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['tue'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="carousel-item ">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Wednesday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['wed'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="carousel-item ">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Thursday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['thur'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="carousel-item ">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Friday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['fri'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="carousel-item">
            <div class="card card0 border-0 mb-3 p-4 text-center">
                <h2 class="text-uppercase">Saturday Bus Schedule</h2>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <?php foreach ($data['sat'] as $slot): ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card counter">
                            <div class="card-body py-0 unsolved-hover">
                                <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="jumbo">
    <div class="jumbotron pt-lg-4">
        <p id="slogan-text" class="fw-bolder"></p>
        <div>
            <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/login';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Login
            </button>
            <button type="button" onclick="location.href='<?php echo URLROOT; ?>/users/register';" class="btn btn-lg btn-dark index-button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up
            </button>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.js"></script>
<script src="https://unpkg.com/typeit@8.7.0/dist/index.umd.js"></script>
<script>

</script>
<!-- <div class="fixed-bottom home-footer"> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
<!-- </div> -->