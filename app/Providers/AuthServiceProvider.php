<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Album;
use App\Http\Requests\AlbumRequest;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Model\Album' => 'App\Policies\AlbumPolicy',
        'App\Model\Photo' => 'App\Policies\PhotoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('manage-album', function(User $user, Album $album){
            return $user->id === $album->user_id;
        });
    }
}
