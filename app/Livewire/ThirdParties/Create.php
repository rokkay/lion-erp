<?php

declare(strict_types=1);

namespace App\Livewire\ThirdParties;

use App\Enums\ThirdPartyCustomerType;
use App\Enums\ThirdPartyStatus;
use App\Models\ThirdParty;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * @property Form $form
 */
#[Layout('layouts.app')]
final class Create extends Component implements HasForms
{
    use InteractsWithForms;

    /**
     * @var array<string, string>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $general = [
            Grid::make()->columns(2)->schema([
                TextInput::make('name'),
                TextInput::make('alias'),
            ]),
            Select::make('customer_type')->options(ThirdPartyCustomerType::class),
            Select::make('type_id')
                ->relationship(name: 'type', titleAttribute: 'label')
                ->searchable()
                ->preload(),
            Select::make('business_type_id')
                ->relationship(name: 'business', titleAttribute: 'label')
                ->searchable()
                ->preload(),
            TextInput::make('tax_id')->label('CIF/NIF'),
            TextInput::make('industry_classification'),
            Toggle::make('is_vat_subject'),
            Select::make('employee_range_id')
                ->relationship(name: 'employeeRange', titleAttribute: 'label')
                ->preload()
                ->searchable(),
            ToggleButtons::make('status')->options(ThirdPartyStatus::class)->inline(),
        ];

        $contact = [
            Textarea::make('address'),
            TextInput::make('zipcode')->maxLength(5),
            Grid::make()->columns(3)->schema([
                TextInput::make('country'),
                TextInput::make('state'),
                TextInput::make('city'),
            ]),
            Grid::make()->columns(2)->schema([
                TextInput::make('phone')->tel(),
                TextInput::make('mobile')->tel(),
            ]),
            TextInput::make('email')->email(),
            TextInput::make('fax')->tel(),
            TextInput::make('website')->url(),
        ];

        $tabs = [
            Tabs\Tab::make('General')->schema($general),
            Tabs\Tab::make('Contact')->schema($contact),
        ];

        return $form
            ->schema([
                Tabs::make('Tabs')->tabs($tabs),
            ])
            ->statePath('data')
            ->model(ThirdParty::class);
    }

    public function create(): void
    {
        ThirdParty::create($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.third-parties.create');
    }
}
