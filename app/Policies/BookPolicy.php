<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{

    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }

        return null;
    }



    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Book $book): bool
    {

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): Response
    {
        return $user->id === $book->user_id
            ? Response::allow()
            : Response::deny('You do not own this novel.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): Response
    {
        return $user->id === $book->user_id
            ? Response::allow()
            : Response::deny('You do not own this novel.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book): bool
    {
        //
    }
}
