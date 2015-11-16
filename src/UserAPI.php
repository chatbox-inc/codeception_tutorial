<?php

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 15/11/16
 * Time: 12:38
 */
class UserAPI
{
    protected $request;

    protected $user;

    /**
     * ApiRoute constructor.
     * @param $request
     * @param $user
     */
    public function __construct(
        \Illuminate\Http\Request $request,
        User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }


    public function getList(){
        $page = $this->request->get("page",0);
        $list = $this->user->take(20)->skip($page*20)->get();

        if(count($list)){
            return $this->responseOk([
                "list" => $list,
                "count" => count($list)
            ]);
        }else{
            return $this->responseBad("user not found");
        }
    }

    public function getShow($uuid){
        $user = $this->user->where("uuid",$uuid)->first();

        if($user){
            return $this->responseOk([
                "user" => $user
            ]);
        }else{
            return $this->responseBad("user not found");
        }
    }

    public function postUpdate($uuid){
        $name = $this->request->get("name");
        $user = $this->user->where("uuid",$uuid)->first();

        if($name && $user){
            $user->name = $name;
            $user->save();
            return $this->responseOk([]);
        }elseif(is_null($user)){
            return $this->responseBad("user not found");
        }else{
            return $this->responseBad("please input name");
        }
    }

    public function postDelete($uuid){
        $user = $this->user->where("uuid",$uuid)->first();

        if($user){
            $user->delete();
            return $this->responseOk([]);
        }else{
            return $this->responseBad("user not found");
        }
    }

    protected function responseOk(array $data){
        $data["status"] = "OK";
        return \Illuminate\Http\JsonResponse::create($data);
    }

    protected function responseBad($message){
        $data = [];
        $data["status"] = "BAD";
        $data["msg"] = $message;
        return \Illuminate\Http\JsonResponse::create($data,404);
    }

}