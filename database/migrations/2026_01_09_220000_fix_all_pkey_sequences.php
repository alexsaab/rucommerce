<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        $tables = [
            'users',
            'personal_access_tokens',
            'jobs',
            'failed_jobs',
            'visits',
            'attributes',
            'attribute_translations',
            'attribute_families',
            'attribute_groups',
            'attribute_options',
            'attribute_option_translations',
            'booking_products',
            'booking_product_default_slots',
            'booking_product_appointment_slots',
            'booking_product_event_tickets',
            'booking_product_rental_slots',
            'booking_product_table_slots',
            'bookings',
            'booking_product_event_ticket_translations',
            'cart_rules',
            'cart_rule_translations',
            'cart_rule_customers',
            'cart_rule_coupons',
            'cart_rule_coupon_usage',
            'catalog_rules',
            'catalog_rule_product_prices',
            'categories',
            'category_translations',
            'cart',
            'cart_items',
            'cart_shipping_rates',
            'cms_pages',
            'cms_page_translations',
            'locales',
            'countries',
            'currencies',
            'currency_exchange_rates',
            'channels',
            'core_config',
            'country_states',
            'country_state_translations',
            'subscribers_list',
            'customer_groups',
            'customers',
            'wishlists',
            'wishlist_items',
            'compare_items',
            'customer_notes',
            'datagrid_saved_filters',
            'imports',
            'import_batches',
            'gdpr_data_requests',
            'inventory_sources',
            'marketing_templates',
            'marketing_events',
            'marketing_campaigns',
            'search_terms',
            'url_rewrites',
            'search_synonyms',
            'products',
            'product_attribute_values',
            'product_reviews',
            'product_images',
            'product_inventories',
            'product_ordered_inventories',
            'product_downloadable_samples',
            'product_downloadable_sample_translations',
            'product_downloadable_links',
            'product_downloadable_link_translations',
            'product_bundle_options',
            'product_bundle_option_translations',
            'product_bundle_option_products',
            'product_customer_group_prices',
            'product_videos',
            'product_review_attachments',
            'product_price_indices',
            'product_inventory_indices',
            'product_customizable_options',
            'product_customizable_option_translations',
            'product_customizable_option_prices',
            'orders',
            'order_items',
            'shipments',
            'shipment_items',
            'invoices',
            'invoice_items',
            'order_payment',
            'downloadable_link_purchased',
            'refunds',
            'refund_items',
            'order_comments',
            'order_transactions',
            'sitemaps',
            'customer_social_accounts',
            'tax_categories',
            'tax_rates',
            'tax_mappings',
            'theme_customizations',
            'theme_customization_translations',
            'admins',
            'roles',
        ];

        foreach ($tables as $tableName) {
            if (! Schema::hasTable($tableName) || ! Schema::hasColumn($tableName, 'id')) {
                continue;
            }

            try {
                $maxId = DB::table($tableName)->max('id');
                
                if ($maxId === null) {
                    continue;
                }

                DB::statement("SELECT setval('{$tableName}_id_seq', ?)", [$maxId]);
            } catch (\Exception $e) {
                // Log or report the exception if a sequence is not found.
                report($e);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This migration cannot be easily reversed.
    }
};
