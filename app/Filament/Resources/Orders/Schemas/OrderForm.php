<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'name'),
                TextInput::make('order_number')
                    ->required(),
                DatePicker::make('order_date')
                    ->required(),
                Select::make('status')
                    ->options(OrderStatus::class)
                    ->default('pending')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
