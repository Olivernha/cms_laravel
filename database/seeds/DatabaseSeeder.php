<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
//         DB::table('users')->truncate();
//        DB::table('posts')->truncate();
//        factory(App\User::class,10)->create();
        factory(App\User::class,10)->create()->each(function ($user){
            $user->post()->save(factory(App\Post::class)->make());
        });

        factory(App\Role::class,3)->create();
        factory(App\Category::class,10)->create();

        factory(App\Photo::class,1)->create();

        factory(App\Comment::class,10)->create()->each(function ($u){
            $u->replies()->save(factory(App\CommentReply::class)->make());
        });
//         $this->call(UsersTableSeeder::class);
    }
}
