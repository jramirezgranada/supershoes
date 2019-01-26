<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Store as StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Load all the stores that are stored in the Database.
     * @return StoreResource
     */
    public function getStores()
    {
        $stores = Store::all();
        return (new StoreResource($stores))
            ->additional([
                'success' => true,
                'total_items' => $stores->count()
            ]);
    }
}
