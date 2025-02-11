<?php

declare(strict_types=1);

use App\Livewire\ThirdParties\Index;
use Livewire\Volt\Volt;

it('can render page', function () {
    Volt::test(Index::class)->assertSuccessful();
});

it('can render default columns', function () {
    Volt::test(Index::class)
        ->assertCanRenderTableColumn('name')
        ->assertCanRenderTableColumn('alias')
        ->assertCanRenderTableColumn('type.label')
        ->assertCanRenderTableColumn('customer_type')
        ->assertCanRenderTableColumn('status');
});
