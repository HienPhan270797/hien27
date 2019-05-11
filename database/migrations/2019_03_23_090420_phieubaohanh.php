<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Phieubaohanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('warrantycards');
        Schema::create('warrantycards', function (Blueprint $table) {
            $table->increments('id');

            $table->string('productname');
            $table->string('productcode')->nullable();
            $table->string('productserial')->nullable();
            $table->dateTime('warrantydate')->nullable(); //ngày bảo hành
            $table->integer('warrantytime')->nullable(); //thời hạn bảo hành (tính theo tháng)
            $table->string('errordetail'); //mô tả lỗi
            $table->string('productstatus')->nullable(); //tình trạng của SP (có trầy xướt hay không,...)

            $table->string('customername');
            $table->string('customerphone');
            $table->string('customeraddress')->nullable();
            $table->string('customeremail')->nullable();

            $table->dateTime('receiveddate'); //ngày nhận máy của khách
            $table->dateTime('app_returndate')->nullable(); //ngày hẹn trả cho khách

            $table->dateTime('sendeddate')->nullable(); //ngày gởi SP về hãng để bảo hành
            $table->dateTime('receipteddate')->nullable(); //ngày nhận SP từ hãng trả về
            $table->dateTime('returneddate')->nullable(); //ngày giao SP lại cho khách

            $table->boolean('iswarranty')->default(1); //là SP bảo hành (hoặc gởi sửa)
            $table->boolean('haswarrantycards')->default(1); //có phiếu hẹn (hoặc không)

            //các liên kết khóa ngoại
            $table->integer('supplierid')->unsigned(); //mã nhà cung cấp (sẽ nhận SP bảo hành)
            $table->foreign('supplierid')->references('id')->on('suppliers');

            $table->integer('received_userid')->unsigned(); //mã NV nhận SP từ khách
            $table->foreign('received_userid')->references('id')->on('users');

            $table->integer('sended_userid')->unsigned(); //mã NV gởi SP đến hãng để bảo hành
            $table->foreign('sended_userid')->references('id')->on('users');

            $table->integer('getback_userid')->unsigned(); //mã NV gởi SP đến hãng để bảo hành
            $table->foreign('getback_userid')->references('id')->on('users');

            $table->integer('returned_userid')->unsigned(); //mã NV gởi trả SP cho khách hàng
            $table->foreign('returned_userid')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('warrantycards');
    }
}
