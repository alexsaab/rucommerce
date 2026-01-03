<?php

namespace Webkul\Product\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Webkul\Product\Helpers\Indexers\Inventory as InventoryIndexer;
use Webkul\Product\Repositories\ProductRepository;

class UpdateCreateInventoryIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param  array  $productIds
     * @return void
     */
    public function __construct(protected $productIds)
    {
        $this->productIds = $productIds;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (! count($this->productIds)) {
            return;
        }

        $order = 'CASE id ';
        foreach ($this->productIds as $index => $id) {
            $order .= "WHEN {$id} THEN {$index} ";
        }
        $order .= 'END';

        $products = app(ProductRepository::class)
            ->whereIn('id', $this->productIds)
            ->orderByRaw($order)
            ->get();

        app(InventoryIndexer::class)->reindexRows($products);
    }
}
