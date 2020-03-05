<?php

namespace App\Model\Db;

class TaskList{
    private $title;
    private $members;
    private $admin;
    private $tasks;
    private $startDate;
    private $endDate;

    public function inviteUser(User $user){
        return null;
    }
    
    // Set new admin to the list -> old admin is no longer admin
    public function setAdmin(User $user){}

    public function getAdmin(){}

    // Add a new user to the members
    public function addMember(User $user){}

    // Removes user from the list and DB};
    public function deleteMember(User $user){return null;}

    public function getMembers(){}

    public function archive(){}

    public function addTask(String $content){}

    public function deleteTask(Task $task){}

    public function modifyTask(Task $task){}


}

?>