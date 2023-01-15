<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

    <body>
    <div style=" margin-top:8%;">
        <div class="row no-gutters my-4 text-center">
            <div class="container-fluid px-md-5 px-lg-1 px-xl-5 py-3 mx-auto">

                <div class="row" style="display: flex;justify-content: space-between;">
                    <?php foreach ($data['slots'] as $slot): ?>
                        <div class="col-lg-3 col-md-6 p-2">
                            <div class="card counter">
                                <div class="card-body py-0 unsolved-hover">
                                    <h1 class="count text-center text-danger"
                                        style="font-size:500% ;"><?php echo $data['allocationCount'][$slot->slot_id]; ?></h1>
                                    <hr class="mt-0 mb-1">
                                    <h4 class="text-center"><?php echo $slot->slot; ?></h4>
                                    <h6 class="text-center"><?php echo $slot->start_from; ?></h6>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
    </body>

<?php require APPROOT . '/views/inc/footer.php'; ?>