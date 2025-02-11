<?php

declare(strict_types=1);

use App\Livewire\ThirdParties\Index;

use function Pest\Livewire\livewire;

it('can render page', function () {
    livewire(Index::class)->assertSuccessful();
});

it('can render default columns', function () {
    livewire(Index::class)
        ->assertCanRenderTableColumn('name')
        ->assertCanRenderTableColumn('alias')
        ->assertCanRenderTableColumn('type.label')
        ->assertCanRenderTableColumn('customer_type')
        ->assertCanRenderTableColumn('status');
});
