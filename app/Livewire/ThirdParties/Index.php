<?php

declare(strict_types=1);

namespace App\Livewire\ThirdParties;

use App\Enums\ThirdPartyCustomerType;
use App\Enums\ThirdPartyStatus;
use App\Models\ThirdParty;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
final class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        $inputs = Grid::make(2)->schema([
            TextInput::make('name'),
            TextInput::make('alias'),
            Select::make('type_id')->relationship(name: 'type', titleAttribute: 'label'),
            TextInput::make('address'),
            TextInput::make('zipcode')->maxLength(5),
            TextInput::make('country'),
            TextInput::make('state'),
            TextInput::make('city'),
            TextInput::make('phone')->tel()->maxLength(9),
            TextInput::make('mobile')->tel()->maxLength(9),
            TextInput::make('email')->email(),
            TextInput::make('fax')->tel()->maxLength(9),
            TextInput::make('website')->url(),
            TextInput::make('tax_id'),
            TextInput::make('industry_classification'),
            Toggle::make('is_vat_subject'),
            Select::make('employee_range_id')->relationship(name: 'employeeRange', titleAttribute: 'label'),

        ]);

        return $table
            ->query(ThirdParty::query())
            ->bulkActions([
                BulkAction::make('delete')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->delete()),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ThirdPartyStatus::class)
                    ->multiple(),
                SelectFilter::make('customer_type')
                    ->options(ThirdPartyCustomerType::class)
                    ->multiple(),
            ])
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('alias'),
                TextColumn::make('type.label'),
                TextColumn::make('phone'),
                TextColumn::make('customer_type')
                    ->badge()
                    ->searchable(false),
                TextColumn::make('status')
                    ->badge()
                    ->searchable(false),
                TextColumn::make('zipcode')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('is_supplier')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('address')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('country')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('state')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('city')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('mobile')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('fax')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('website')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tax_id')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('industry_classification')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('is_vat_subject')->toggleable(isToggledHiddenByDefault: true)->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('employeeRange.label')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('logo')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()->form([$inputs]),
                    EditAction::make()->form([$inputs]),
                    DeleteAction::make(),
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.third-parties.index');
    }
}
