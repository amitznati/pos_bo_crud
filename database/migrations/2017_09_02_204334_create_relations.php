<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_taxes', function (Blueprint $table) {
            $table->foreign('payment_id', 'FK_PaymentTax_Order')->references('id')->on('orders');
            $table->foreign('tax_id', 'FK_Tax_Taxes')->references('id')->on('taxes');
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->foreign('type', 'FK_PType_PropertyType')->references('id')->on('property_types');
        });
        Schema::table('credit_payments_details', function (Blueprint $table) {
            $table->foreign('credit_payment_id', 'FK_CreditPaymentsDetails_CreditPayment')
                ->references('id')->on('credit_payments');
        });
        Schema::table('order_lines', function (Blueprint $table) {
            $table->foreign('order_id', 'orderline_ordId')->references('id')->on('orders');
            $table->foreign('product_id', 'FK_OrderLine_Product')->references('id')->on('products');
        });
        Schema::table('payments', function (Blueprint $table) {
             $table->foreign('order_payment_id', 'FK_Payment_OrderPayment')
                ->references('id')->on('order_payments');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id', 'FK_Order_Customer')->references('id')->on('customers');
            $table->foreign('employee_id', 'FK_Order_Employee')->references('id')->on('employees');
            $table->foreign('pos_id', 'FK_Order_POS')->references('id')->on('pos');
            $table->foreign('z_num', 'FK_Order_ZReport')->references('z_number')->on('z_reports');
            $table->foreign('order_payment_id', 'FK_Order_OrderPayment')->references('id')->on('order_payments');
        });
        Schema::table('rel_vandor_contact', function (Blueprint $table) {         
            $table->foreign('contact_id', 'FK_RelVandorContact_Contact')->references('id')->on('contacts');
            $table->foreign('vendor_id', 'FK_RelVandorContact_Vendor')->references('id')->on('vendors');
        });
        Schema::table('daily_attendance', function (Blueprint $table) {
            $table->foreign('employee_id', 'dailyattendance_empId')->references('id')->on('employees');
        });
        Schema::table('z_reports', function (Blueprint $table) {
            $table->foreign('employee_id', 'FK_ZReport_Employee')->references('id')->on('employees');
        });
        Schema::table('employee_salery', function (Blueprint $table) {
            $table->foreign('employee_id', 'FK_EmployeeSalery_Employee')->references('id')->on('employees');
            $table->foreign('salery_type_id', 'FK_EmployeeSalery_SaleryType')->references('id')->on('salery_types');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('dept_id', 'FK_Product_Department')->references('id')->on('departments');
            $table->foreign('group_id', 'FK_Product_Group')->references('id')->on('groups');
            $table->foreign('vendor_id', 'FK_Product_Vendor')->references('id')->on('vendors');
        });
        Schema::table('display_info', function (Blueprint $table) {
            $table->foreign('menu_id', 'FK_ItemDisplayInfo_Menu')
                ->references('id')->on('menus')
                ->onDelete('cascade');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('department_id', 'FK_Group_Department')->references('id')->on('departments');
        });
        Schema::table('pos', function (Blueprint $table) {        
            $table->foreign('store_id', 'FK_POS_Store')->references('id')->on('stores');
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
    }
}
