<?php

/**
 * Pages controller that handle request's prefix with 'pages'.
 */
class PagesController extends Controller {

    private $adminModel;
    private $userModel;
    private $slotModel;
    /**
     * Default constructor.
     */
    public function __construct() {

        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->slotModel = $this->model('Slot');

    }

    /**
     * This method handle requests '/pages/index' and /pages.
     *
     * @return void
     */
    public function index() {

        if (isLoggedIn()) {
            redirect('forms');
        }

        $data = [
            'sun' => $this->slotModel->getSlotsByDay('Sun'),
            'mon' => $this->slotModel->getSlotsByDay('Mon'),
            'tue' => $this->slotModel->getSlotsByDay('Tue'),
            'wed' => $this->slotModel->getSlotsByDay('Wed'),
            'thur' => $this->slotModel->getSlotsByDay('Thur'),
            'fri' => $this->slotModel->getSlotsByDay('Fri'),
            'sat' => $this->slotModel->getSlotsByDay('Sat'),
        ];

        $this->view('/pages/index', $data);
    }

    /**
     * This method handle requests '/pages/about'.
     *
     * @return void
     */
    public function about() {
        $data = [
            'title' => 'About us'
        ];
        $this->view('/pages/about', $data);
    }
}
