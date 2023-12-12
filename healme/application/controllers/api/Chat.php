<?php

class Chat extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mchat' => 'm',
            'Mitemchat' => 'ic'
        ]);
    }

    public function list($userId)
    {
        $itemChatValid = $this->db
            ->join('chat', 'chat.id=item_chat.chat_id')
            ->where("from_id='$userId' OR to_id='$userId'")
            ->order_by('item_chat.id', 'desc')
            ->get('item_chat');

        $user = [];
        $tokenChat = [];
        foreach ($itemChatValid->result() as $item) {
            if (isset($tokenChat[$item->token])) {
                array_push($tokenChat[$item->token], $item);
            } else {
                $tokenChat[$item->token][] = $item;
            }

            if ($item->from_id == $userId && !isset($user[$item->to_id])) {
                $user[$item->to_id] = $item->token;
            } else if ($item->to_id == $userId && !isset($user[$item->from_id])) {
                $user[$item->from_id] = $item->token;
            }
        }

        $data = [];
        foreach ($user as $keyUser => $valUser) {
            $user = $this->db->get_where('users', ['id' => $keyUser])->row();
            array_push($data, [
                'user' => $user,
                'chat' => $tokenChat[$valUser]
            ]);
        }

        if(count($data) > 0){
            $this->toJSON([
                'status' => 200,
                'data' => $data
            ]);
        }else{
            $this->toJSON([
                'status' => 404,
                'data'=> []
            ]);
        }
    }

    public function send()
    {
        $data = json_decode(file_get_contents('php://input'));


        if ($data->token != "") {
            $item = [
                'chat_id' => $data->chat_id,
                'from_id' => $data->from_id,
                'to_id' => $data->to_id,
                'message' => $data->message
            ];
            $this->ic->add($item);

            $this->toJSON([
                'status' => 200,
                'token' => $data->token,
                'chat_id' => $data->chat_id,
                'data' => [$item]
            ]);
        } else {
            $token = randomChar(8) . '.' . randomChar(8) . '.' . randomChar(8);
            $chatId = $this->m->add(['token' => $token]);

            $item = [
                'chat_id' => $chatId,
                'from_id' => $data->from_id,
                'to_id' => $data->to_id,
                'message' => $data->message
            ];
            $this->ic->add($item);

            $this->toJSON([
                'status' => 200,
                'token' => $token,
                'chat_id' => $chatId,
                'data' => [$item]
            ]);
        }
    }

    public function room()
    {
        $data = json_decode(file_get_contents('php://input'));

        $itemChatValid = $this->db
            ->join('chat', 'chat.id=item_chat.chat_id')
            ->where("(from_id='$data->from_id' AND to_id='$data->to_id') OR (to_id='$data->from_id' AND from_id='$data->to_id')")
            ->order_by('item_chat.id', 'asc')
            ->get('item_chat');

        if ($itemChatValid->num_rows() > 0) {
            $this->toJSON([
                'status' => 200,
                'token' => $itemChatValid->row()->token,
                'chat_id' => $itemChatValid->row()->chat_id,
                'data' => $itemChatValid->result()
            ]);
        } else {
            $this->toJSON([
                'status' => 200,
                'token' => "",
                'chat_id' => "",
                'data' => []
            ]);
        }
    }
}
