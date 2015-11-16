<?php

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 15/11/16
 * Time: 12:07
 */
class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "users";

    protected $fillable = ["uuid","name","email","age"];

    public function random(){
        $randString = sha1(mt_rand());
        $nameMap = ["Tom","Mary","Bob","Rob","Mike","Abe","Ally","Nancy","Candy","Dan","Gene","Gil","Jo","Val","Vince","Tiff","Tim","Tracy","Stef","Sam","Rudy","Randy","Pat","Polly","Peg"];

        $prop = [];
        $prop["uuid"] = sha1(mt_rand());
        $prop["name"] = $nameMap[array_rand($nameMap)];
        $prop["email"] = $randString."@chatbox-inc.com";
        $prop["age"] = mt_rand(21,60);
        return $this->newInstance($prop);
    }
}