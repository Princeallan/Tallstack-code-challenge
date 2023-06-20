<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->required(),
                                Forms\Components\TextInput::make('price')
                                    ->numeric()->mask(fn (Mask $mask) => $mask
                                        ->numeric()
                                        ->thousandsSeparator(',')
                                        ->minValue(1)
                                    ),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name'),
                                Forms\Components\Select::make('location_id')
                                    ->relationship('location', 'name'),
                                Forms\Components\Select::make('property_status_id')
                                    ->relationship('propertyStatus', 'name'),
                                Forms\Components\Select::make('property_type_id')
                                    ->relationship('propertyType', 'name'),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->required(),
                        Forms\Components\FileUpload::make('thumbnail'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('location.name'),
                Tables\Columns\TextColumn::make('propertyStatus.name'),
                Tables\Columns\TextColumn::make('propertyType.name'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'view' => Pages\ViewProperty::route('/{record}'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
