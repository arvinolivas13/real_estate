<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_img')->default('default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('company_id');
            $table->string('status');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        
        DB::table('users')->insert([
            [
                'firstname' => 'Super', 
                'middlename' => '', 
                'lastname' => 'Admin',
                'suffix' => '',
                'profile_img' => 'default.jpg', 
                'email' => 'superadmin@gmail.com', 
                'status' => '1', 
                'company_id' => '1', 
                'created_by' => '1', 
                'password' => Hash::make('P@ssw0rd')
            ]
        ]);
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
