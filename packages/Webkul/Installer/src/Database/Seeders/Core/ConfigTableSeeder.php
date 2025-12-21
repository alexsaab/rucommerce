<?php

namespace Webkul\Installer\Database\Seeders\Core;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('core_config')->delete();

        $now = Carbon::now();

        DB::table('core_config')->insert([
            [
                'code'         => 'sales.checkout.shopping_cart.allow_guest_checkout',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.registration',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.customer_registration_confirmation_mail_to_admin',
                'value'        => '0',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.customer_account_credentials',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_order',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_order_mail_to_admin',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_invoice',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_invoice_mail_to_admin',
                'value'        => '0',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_refund',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_refund_mail_to_admin',
                'value'        => '0',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_shipment',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_shipment_mail_to_admin',
                'value'        => '0',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.new_inventory_source',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.cancel_order',
                'value'        => '1',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'code'         => 'emails.general.notifications.emails.general.notifications.cancel_order_mail_to_admin',
                'value'        => '0',
                'channel_code' => null,
                'locale_code'  => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}
