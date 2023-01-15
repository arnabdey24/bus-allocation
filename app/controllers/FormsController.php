<?php

/**
 * Posts controller that handle request's prefix with 'posts'.
 */
class FormsController extends Controller {

    private $userModel;
    private $slotModel;

    /**
     * Default constructor.
     */
    public function __construct() {
        security();

        if ($_SESSION['is_admin']){
            redirect('admins');
        }

        $this->userModel = $this->model('User');
        $this->slotModel = $this->model('Slot');
    }


    /**
     * This method handle requests '/pages/index' and /pages.
     *
     * @return void
     */
    public function index() {

        date_default_timezone_set('Asia/Dhaka');

        $timestamp = time();
        $cur_date = date("d-m-Y (D)", $timestamp);
        $next_date = date("d-m-Y (D)", $timestamp + 86400);
        $next_day = date("D", $timestamp + 86400);

        $slots = $this->slotModel->getSlotsByDay($next_day);
        $allocations = $this->userModel->getAllocationByDay($next_date);

        $data = [
            'title' => SITENAME,
            'cur_date' => $cur_date,
            'next_date' => $next_date,
            'next_day' => $next_day,
            'slots' => $slots,
            'allocations'=>$allocations
        ];

        $this->view('/forms/index', $data);
    }

    public function addSlot($id) {

        date_default_timezone_set('Asia/Dhaka');
        $timestamp = time();
        $cur_date = date("d-m-Y (D)", $timestamp);
        $next_date = date("d-m-Y (D)", $timestamp + 86400);
        $next_day = date("D", $timestamp + 86400);

        $slot = $this->slotModel->getSlotById($id);

        if ($this->slotModel->slotExist($next_date, $slot)) {
            flash("form_feedback", "You cannot request for multiple seats in a time slot",'alert alert-danger');
        } else {
            flash("form_feedback", "Request complete");
            $this->slotModel->addAllocation($next_date, $slot);
        }


        redirect("forms");
    }

    public function removeAllocation($id) {

        if($this->userModel->removeAllocationById($id)){
            flash("form_feedback", "Allocation removed");
        }else{
            flash("form_feedback", "Error try again",'alert alert-danger');
        }


        redirect("forms");
    }


}
