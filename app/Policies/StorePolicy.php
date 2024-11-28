<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{

    public function update(User $user, Store $store): bool
    {
        return $user->id === $store->user_id;
    }


    public function destroy(User $user, Store $store): bool
    {
        // Menggunakan aturan yang sama seperti metode update
        return $this->update($user, $store);
    }

//    public function update(User $user, Store $store): Response
//    {
//        return $user->id === $store->user_id
//            ? Response::allow()
//            : Response::denyAsNotFound('You are not authorized to update this store.');
//    }
}
