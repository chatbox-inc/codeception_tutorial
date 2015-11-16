<?php

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 15/11/16
 * Time: 12:38
 */
class SessionAPI
{
    protected $request;

    /**
     * ApiRoute constructor.
     * @param $request
     * @param $user
     */
    public function __construct(
        \Illuminate\Http\Request $request
    ){
        $this->request = $request;
        $request->session()->start();
    }


    public function getCount(){
        $count = $this->request->session()->get("count");
        $count++;
        $this->request->session()->put("count",$count);
        return $this->responseOk([
            "count" => $count
        ]);
    }

    public function getReset(){
        $this->request->session()->put("count",0);
        return $this->responseOk([]);
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