<?php

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 15/11/16
 * Time: 12:02
 */
class CreateDatabase extends \Illuminate\Console\Command
{
    protected $signature = "db:create";


    public function handle(
    ){

        /** @var \Illuminate\Database\DatabaseManager $databaseManager */
        $databaseManager = app("db");
        $builder = $databaseManager->connection()->getSchemaBuilder();

        $builder->dropIfExists("users");
        $builder->create("users",function(\Illuminate\Database\Schema\Blueprint $blueprint){
            $blueprint->increments("id");
            $blueprint->string("uuid");
            $blueprint->string("name");
            $blueprint->string("email");
            $blueprint->unsignedInteger("age");
            $blueprint->timestamps();
        });

        $user = new User();
        foreach(range(1,125) as $count){
            $user->random()->save();
        }

    }
}