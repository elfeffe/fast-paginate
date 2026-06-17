<?php

/**
 * @author Aaron Francis <aaron@tryhardstudios.com>
 */

namespace AaronFrancis\FastPaginate;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class FastPaginateProvider extends ServiceProvider
{
    public function boot()
    {
        // The original upstream used Builder::mixin(...), which was removed
        // in Laravel 11+ (Eloquent's Macroable no longer forwards mixins).
        // Register each fast-pagination entry point as an explicit macro
        // bound to the current Builder/Relation instance.
        Builder::macro('fastPaginate', (new FastPaginate)->fastPaginate());
        Builder::macro('simpleFastPaginate', (new FastPaginate)->simpleFastPaginate());

        Relation::macro('fastPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {
            return $this->getQuery()->fastPaginate($perPage, $columns, $pageName, $page);
        });

        Relation::macro('simpleFastPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {
            return $this->getQuery()->simpleFastPaginate($perPage, $columns, $pageName, $page);
        });

        if (class_exists(\Laravel\Scout\Builder::class)) {
            \Laravel\Scout\Builder::macro('fastPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {
                return $this->query()->fastPaginate($perPage, $columns, $pageName, $page);
            });
        }
    }
}
