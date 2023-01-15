<?php

/**
 * Admin Model works to retrieve, manipulate or delete data that is associated to the admin.
 * This Model is a representation of all data that is used by system admin and has the methods to change them.
 */
class Slot {

    /**
     * @var Database instance of database.
     */
    private $db;

    /**
     *  Constructor for Admin model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllocationCount($next_date,$slot_id){
        $this->db->query('select * from allocations where slot_id=:slot_id and date=:date');
        $this->db->bind(':slot_id',$slot_id);
        $this->db->bind(':date',$next_date);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function add($data){
        $this->db->query('insert into slots(day,slot,start_from) values (:day,:slot,:from)');
        $this->db->bind(':day',$data['day']);
        $this->db->bind(':slot',$data['slot']);
        $this->db->bind(':from',$data['from']);
        return $this->db->execute();
    }

    public function update($id,$data){
        $this->db->query('update slots set day=:day , slot=:slot , start_from=:from where slot_id=:slot_id');
        $this->db->bind(':slot_id',$id);
        $this->db->bind(':day',$data['day']);
        $this->db->bind(':slot',$data['slot']);
        $this->db->bind(':from',$data['from']);
        return $this->db->execute();
    }

    public function delete($id){
        $this->db->query('delete  from slots where slot_id=:id');
        $this->db->bind(':id',$id);
        return $this->db->execute();
    }

    public function getAllSlots() {
        $this->db->query('select * from slots');
        return $this->db->resultSet();
    }

    public function getSlotsByDay($day) {
        $this->db->query('select * from slots where day=:day');
        $this->db->bind(':day',$day);

        return $this->db->resultSet();
    }

    public function getSlotByID($id) {
        $this->db->query('select * from slots where slot_id=:id');
        $this->db->bind(':id',$id);

        return $this->db->single();
    }

    public function slotExist($date,$slot){
        $this->db->query('select * from allocations where date=:date and user_id=:user_id and slot_id=:slot_id');

        $this->db->bind(':date',$date);
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':slot_id',$slot->slot_id);

        return count($this->db->resultSet())>0;
    }

    public function addAllocation($date,$slot){
        $this->db->query('insert into allocations(date,user_id,slot_id) values(:date,:user_id,:slot_id)');

        $this->db->bind(':date',$date);
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':slot_id',$slot->slot_id);

        $this->db->execute();
    }

}