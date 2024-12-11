<?php

namespace App\Http\Controllers;

use App\Enums\StoreStatus;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{

    public function list()
    {
        $stores = Store::query()
            ->with('user:id,name')
            ->withCount('products')
            ->latest()
            ->paginate(8);

        // return $stores;

        return view('stores.list', [
            'stores' => $stores,
        ]);
    }

    public function approve(Store $store)
    {
        $store->load('user');
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return back();
    }

    public function mine(Request $request)
    {
        $stores = Store::query()
            ->where('user_id', $request->user()->id)
            ->with('user:id,name') // Muat relasi `user` untuk optimasi
            ->latest()
            ->paginate(8);

        return view('stores.mine', [
            'stores' => $stores,
        ]);
    }

    public function index()
    {
        $stores = Store::query()
            ->where('status', StoreStatus::ACTIVE)
            ->latest()
            ->paginate(8);

        return view('stores.index', [
            'stores' => $stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form', [
            'store' => new Store(),
            'page_meta' => [
                'title' => 'Create Store',
                'description' => 'Create a new store',
                'method' => 'POST',
                'url' => route('stores.store'),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $file = $request->file('logo');

        $request->user()->stores()->create([
            ...$request->validated(),
            ...['logo' => $file->store('images/stores')],
        ]);

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return view('stores.show', [
            'store' => $store->loadCount('products'),
            'products' => $store->products()->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {
        //        dd(Gate::check('isPartner',));
        //        Gate::authorize('update', $store);

        return view('stores.form', [
            'store' => $store,
            'page_meta' => [
                'title' => 'Edit Store',
                'description' => 'Edit store: ' . $store->name,
                'method' => 'PUT',
                'url' => route('stores.update', $store),
            ]
        ]);
    }

    public function update(StoreRequest $request, Store $store)
    {
        if ($request->hasFile('logo')) {
            Storage::delete($store->logo);
            $file = $request->file('logo')->store('images/stores');
        } else {
            $file = $store->logo;
        }

        //        Gate::authorize('update', $store);

        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $file,
        ]);

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
