<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Brand::query()
            ->select('id', 'name')
            ->when(
                $request->search, fn (Builder $query) => $query 
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->selected, fn (Builder $query) => $query->where('id', $request->selected)
            )
            ->get();
    }
}
