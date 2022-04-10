<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\VisitRequest;

class AddIsAcceptedColumnInVisitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            $table->string('status')->default(VisitRequest::STATUS['PENDING']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            //
        });
    }
}
