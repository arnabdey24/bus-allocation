<?php

/**
 * Admins controller that handle request's prefix with 'admins'.
 */
class AdminsController extends Controller {

    private $adminModel;
    private $userModel;
    private $slotModel;

    /**
     * Default constructor.
     */
    public function __construct() {
        security();
        if (!$_SESSION['is_admin']) {
            redirect('errors');
        }

        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->slotModel = $this->model('Slot');
    }

    public function index() {

        date_default_timezone_set('Asia/Dhaka');

        $timestamp = time();
        $cur_date = date("d-m-Y (D)", $timestamp);
        $next_date = date("d-m-Y (D)", $timestamp + 86400);
        $next_day = date("D", $timestamp + 86400);

        $slots = $this->slotModel->getSlotsByDay($next_day);

        $allocationCount=[];

        foreach ($slots as $slot){
            $allocationCount[$slot->slot_id]=$this->slotModel->getAllocationCount($next_date,$slot->slot_id);
        }

        $data = [
            'title' => SITENAME,
            'cur_date' => $cur_date,
            'next_date' => $next_date,
            'next_day' => $next_day,
            'slots' => $slots,
            'allocationCount'=>$allocationCount
        ];

        $this->view('/admins/index', $data);
    }

    public function manageSchedule(){

        $data = [
            'title' => SITENAME,
            'slots' =>$this->slotModel->getAllSlots()
        ];

        $this->view('/admins/manageSchedule', $data);
    }

    public function deleteSlot($id){

        $this->slotModel->delete($id);

        $data = [
            'title' => SITENAME,
            'slots' =>$this->slotModel->getAllSlots()
        ];

        $this->view('/admins/manageSchedule', $data);
    }

    public function addSlot(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->slotModel->add($_POST);
        }

        $data = [
            'title' => SITENAME,
            'slots' =>$this->slotModel->getAllSlots()
        ];

        $this->view('/admins/manageSchedule', $data);
    }

    public function updateSlot($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->slotModel->update($id,$_POST);
        }

        $data = [
            'title' => SITENAME,
            'slots' =>$this->slotModel->getAllSlots()
        ];

        $this->view('/admins/manageSchedule', $data);
    }


}
