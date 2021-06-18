<?php


namespace App\Services;


use App\Models\Chat;

class ChatService
{
    /**
     * @return Chat[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getMessages(){
        return Chat::all();
    }
}
