<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('role_id')->index();
            $table->rememberToken();
            $table->timestamps();
        });
        $users = [
            [
                'name' => 'Admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('12345678'),
                'role_id'=> 1,
            ],
            [
                'name' => 'Artist',
                'email'=>'artist@gmail.com',
                'password'=> Hash::make('12345678'),
                'role_id'=> 2,
            ],
            [
                'name' => 'Test User',
                'email'=>'test@gmail.com',
                'password'=> Hash::make('12345678'),
                'role_id'=> 3,
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
