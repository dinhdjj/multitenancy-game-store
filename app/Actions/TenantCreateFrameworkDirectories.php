<?php

declare(strict_types=1);

namespace App\Actions;

use File;
use Lorisleiva\Actions\Concerns\AsAction;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Events\TenantCreated;

class TenantCreateFrameworkDirectories
{
    use AsAction;

    public function handle(Tenant $tenant): void
    {
        $tenant->run(function ($tenant): void {
            File::makeDirectory(storage_path('framework/cache'), 0o777, true, true);
            File::makeDirectory(storage_path('framework/cache/data'), 0o777, true, true);
        });
    }

    public function asListener(TenantCreated $event): void
    {
        $this->handle($event->tenant);
    }
}
