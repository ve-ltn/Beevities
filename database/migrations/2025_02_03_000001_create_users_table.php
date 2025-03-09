<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('number')->nullable();
            $table->integer('role')->default(0); // 0 = User, 1 = Admin, 2 = Organization Admin
            $table->foreignId('organization_id')->nullable()->constrained('organizations')->onDelete('cascade');
            $table->timestamps();
        });        
    }
    

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
