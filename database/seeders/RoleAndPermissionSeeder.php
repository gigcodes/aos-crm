<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Filament\Pages\Onboard;
use App\Filament\Pages\PasswordResetPage;
use App\Filament\Resources\ProjectResource;
use BezhanSalleh\FilamentShield\Resources\RoleResource;
use BezhanSalleh\FilamentShield\Resources\RoleResource\Pages\ListRoles;
use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    use EvaluatesClosures;

    public array $resources = [
        ProjectResource::class,
        RoleResource::class
    ];

    public array $pages = [
        Onboard::class,
        PasswordResetPage::class
    ];

    public array $widgets = [

    ];

    public array $customer_pages = [
        Onboard::class,
        PasswordResetPage::class
    ];

    public array $customer_widgets = [

    ];


    public array $customer_resources = [
        ProjectResource::class,
    ];

    public array $excluded_resources = [];

    protected function getDefaultPermissionIdentifier(string $resource): string
    {
        return Str::of($resource)
            ->afterLast('Resources\\')
            ->before('Resource')
            ->replace('\\', '')
            ->snake()
            ->replace('_', '::');
    }

    public function getResources($resources): ?array
    {
        return collect($resources)
            ->reject(function ($resource) {
                return in_array(
                    Str::of($resource)->afterLast('\\'),
                    $this->excluded_resources
                );
            })
            ->mapWithKeys(function ($resource) {
                $name = $this->getDefaultPermissionIdentifier($resource);

                return [
                    $name => [
                        'resource' => "{$name}",
                        'model' => str($resource::getModel())->afterLast('\\')->toString(),
                        'fqcn' => $resource,
                    ],
                ];
            })
            ->sortKeys()
            ->toArray();
    }

    public static function getPages($pages): ?array
    {
        return collect($pages)
            ->reject(function ($page) {
                if (Utils::isGeneralExcludeEnabled()) {
                    return in_array(Str::afterLast($page, '\\'), Utils::getExcludedPages());
                }
            })
            ->mapWithKeys(function ($page) {
                $permission = Str::of(class_basename($page))
                    ->prepend(
                        Str::of(Utils::getPagePermissionPrefix())
                            ->append('_')
                            ->toString()
                    )
                    ->toString();

                return [
                    $permission => [
                        'class' => $page,
                        'permission' => $permission,
                    ],
                ];
            })
            ->toArray();
    }

    public function getAllResourcePermissions($resources): array
    {
        return collect($this->getResources($resources))
            ->map(function ($resourceEntity) {
                return collect(
                    Utils::getResourcePermissionPrefixes($resourceEntity['fqcn'])
                )
                    ->flatMap(function ($permission) use ($resourceEntity) {
                        $name = $permission . '_' . $resourceEntity['resource'];

                        return [
                            $name,
                        ];
                    })
                    ->toArray();
            })
            ->sortKeys()
            ->collapse()
            ->toArray();
    }

    public static function getWidgets($widgets): ?array
    {
        return collect($widgets)
            ->reject(function ($widget) {
                if (Utils::isGeneralExcludeEnabled()) {
                    return in_array(
                        needle: str(
                            static::getWidgetInstanceFromWidgetConfiguration($widget)
                        )
                            ->afterLast('\\')
                            ->toString(),
                        haystack: Utils::getExcludedWidgets()
                    );
                }
            })
            ->mapWithKeys(function ($widget) {
                $permission = Str::of(class_basename(static::getWidgetInstanceFromWidgetConfiguration($widget)))
                    ->prepend(
                        Str::of(Utils::getWidgetPermissionPrefix())
                            ->append('_')
                            ->toString()
                    )
                    ->toString();

                return [
                    $permission => [
                        'class' => static::getWidgetInstanceFromWidgetConfiguration($widget),
                        'permission' => $permission,
                    ],
                ];
            })
            ->toArray();
    }

    protected function getEntitiesPermissions($resources, $pages = [], $widgets = []): ?array
    {
        return collect($this->getAllResourcePermissions($resources))
            ->merge(collect($this->getPages($pages))->map->permission)
            ->merge(collect($this->getWidgets($widgets))->map->permission)
            ->values()
            ->unique()
            ->toArray();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->handlePermissions();
        $this->handleRoles();
    }

    /**
     * Generates the permissions for the site
     */
    protected function handlePermissions(): void
    {
        collect($this->getEntitiesPermissions($this->resources, $this->pages, $this->widgets))
            ->each(callback: fn(string $permission_name) => Permission::findOrCreate($permission_name));
    }

    /**
     * Generates the roles for the site and assigns their permissions
     */
    protected function handleRoles(): void
    {
        Role::findOrCreate(Roles::SUPER_ADMIN->value)
            ->givePermissionTo(Permission::all());

        Role::findOrCreate(Roles::CUSTOMER->value)
            ->givePermissionTo($this->getEntitiesPermissions($this->customer_resources, $this->customer_pages, $this->customer_widgets));
    }

    protected static function getWidgetInstanceFromWidgetConfiguration(string|WidgetConfiguration $widget): string
    {
        return $widget instanceof WidgetConfiguration
            ? $widget->widget
            : $widget;
    }
}
