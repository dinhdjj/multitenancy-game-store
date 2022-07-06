<?php

declare(strict_types=1);

namespace App\Tenancy\Bootstrappers;

use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;

class Filesystem implements TenancyBootstrapper
{
    public ?string $oldPublicUrl;

    public function bootstrap(Tenant $tenant): void
    {
        if (\in_array('public', config('tenancy.filesystem.disks'), true)) {
            $this->oldPublicUrl = config('filesystems.disks.public.url');
            config(['filesystems.disks.public.url' => config('app.url').'/storage/'.config('tenancy.filesystem.suffix_base').$tenant->getTenantKey()]);
        }
    }

    public function revert(): void
    {
        if (\in_array('public', config('tenancy.filesystem.disks'), true)) {
            config(['filesystems.disks.public.url' => $this->oldPublicUrl]);
        }
    }
}
