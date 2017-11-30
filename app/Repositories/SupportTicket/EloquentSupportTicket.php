<?php

namespace App\Repositories\SupportTicket;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\SupportTicket;



class EloquentSupportTicket extends EloquentRepo implements ISupportTicketRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new SupportTicket;
    }
    

    

}
