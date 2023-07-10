<?php

namespace Tasdildiren\PrimevueDatatables;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tasdildiren\PrimevueDatatables\Skeleton\SkeletonClass
 */
class PrimevueDatatablesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'primevue-datatables';
    }
}
