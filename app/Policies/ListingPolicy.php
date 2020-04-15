<?php

namespace App\Policies;

use App\{User, Listing};
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Listing $listing
     * @return bool
     */
    public function edit(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    /**
     * @param User $user
     * @param Listing $listing
     * @return bool
     */
    public function update(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    /**
     * @param User $user
     * @param Listing $listing
     * @return bool
     */
    public function destroy(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    /**
     * @param User $user
     * @param Listing $listing
     * @return bool
     */
    public function touch(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
