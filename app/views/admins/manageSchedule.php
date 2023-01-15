<?php require APPROOT . '/views/inc/header.php'; ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">
    <style>
        .tableDataWrap {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid black;
        }
    </style>
<?php require_once APPROOT . '/views/inc/navbar.php'; ?>


    <!-----------------Delete modal start------------------------->
    <div id="modal-here"></div>
    <!-----------------Delete modal end------------------------->

    <!-----------------Add Modal start------------------------->
    <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo URLROOT; ?>/admins/addSlot" method="post">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel">New Schedule:</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Day:</label>
                        <select name="day" class="form-control">
                            <option value="Sat">Sat</option>
                            <option value="Sun">Sun</option>
                            <option value="Mon">Mon</option>
                            <option value="Tue">Tue</option>
                            <option value="Wed">Wed</option>
                            <option value="Thur">Thur</option>
                            <option value="Fri">Fri</option>
                        </select>

                        <label class="form-label">Time:</label>
                        <input type="text" name="slot" id="slot" class="form-control" placeholder="8.30am">

                        <label class="form-label">From:</label>
                        <input type="text" name="from" id="from" class="form-control" placeholder="Hospital Road">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-sm btn-success" data-bs-dismiss="modal" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-----------------Add Modal end------------------------->

    <!-----------------Update Modal start------------------------->
    <div id="modal-update"></div>

    <!-----------------Update Modal end------------------------->

    <div class="main py-5">
        <?php flash('admin'); ?>
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">
                        <i class="fas fa-table me-1"></i> <span class="table-head">Manage Schedule</span>
                    </div>
                    <div class="col col-md-6" align="right">
                        <button class="btn btn-sm text-primary" data-bs-toggle="modal"
                                data-bs-target="#addCategoryModal"><b><i class="fa-solid fa-plus"></i> Add </b>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table my-4 cell-border pt-3 table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Day</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">From</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['slots'] as $slot) : ?>
                        <tr class="text-center">
                            <td class="tableDataWrap"><?php echo $slot->day; ?></td>
                            <td class="tableDataWrap"><?php echo $slot->slot; ?></td>
                            <td class="tableDataWrap"><?php echo $slot->start_from; ?></td>
                            <td class="d-flex justify-content-around tableDataWrap">
                                <button onclick='update(<?php echo $slot->slot_id.',"'.$slot->day.'","'.$slot->slot.'","'.$slot->start_from.'"'; ?>)' class="btn btn-sm text-primary"><b>Update</b>
                                </button>
                                <button onclick="remove(<?php echo $slot->slot_id; ?>)" class="btn btn-sm text-danger"><b>Remove</b>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        function remove(id) {
            $('#modal-here').html("<div class='modal fade' id='removeUser' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>" +
                "<div class='modal-dialog'>" +
                "<div class='modal-content'>" +
                "<div class='modal-header'>" +
                "<h6 class='modal-title' id='staticBackdropLabel'>Delete Confirmation</h6>" +
                "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>" +
                "</div>" +
                " <div class='modal-body'>" +
                " Are you sure you want to remove this user?" +
                "</div>" +
                "<div class='modal-footer'>" +
                "<button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>" +
                "<a href='<?php echo URLROOT; ?>/admins/deleteSlot/" + id + "' class='btn btn-sm text-danger'>" +
                "<b>Delete</b></a>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>");

            $('#removeUser').modal('toggle');
        }

        function update(id,day,slot,start_from) {
            $('#modal-update').html("<div class='modal fade' id='updateModal' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'"+
                "aria-labelledby='staticBackdropLabel' aria-hidden='true'>"+
            "<div class='modal-dialog'>"+
            "   <div class='modal-content'>"+
            "   <form action='<?php echo URLROOT; ?>/admins/updateSlot/"+id+"' method='post'>"+
            "   <div class='modal-header'>"+
            "   <h6 class='modal-title' id='staticBackdropLabel'>Update Schedule:</h6>"+
            "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>"+
            "</div>"+
            "<div class='modal-body'>"+
            "   <label class='form-label'>Day:</label>"+
            "   <select name='day' id='daySelector' class='form-control' data-selected='"+day+"'>"+
            "       <option value='Sat'>Sat</option>"+
            "       <option value='Sun'>Sun</option>"+
            "       <option value='Mon'>Mon</option>"+
            "       <option value='Tue'>Tue</option>"+
            "       <option value='Wed'>Wed</option>"+
            "       <option value='Thur'>Thur</option>"+
            "       <option value='Fri'>Fri</option>"+
            "   </select>"+
            ""+
            "   <label class='form-label'>Time:</label>"+
            "   <input type='text' name='slot' class='form-control' value='"+slot+"' placeholder='8.30am'>"+
            ""+
            "       <label class='form-label'>From:</label>"+
            "       <input type='text' name='from' class='form-control' value='"+start_from+"' placeholder='Hospital Road'>"+
            ""+
            "</div>"+
            "<div class='modal-footer'>"+
            "   <button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>"+
            "   <input type='submit' class='btn btn-sm btn-success' data-bs-dismiss='modal' value='Update'>"+
            "</div>"+
            "</form>"+
            "</div>"+
            "</div>"+
            "</div>");

            $('#updateModal').modal('toggle');
            document.getElementById('daySelector').value=day;
        }
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>