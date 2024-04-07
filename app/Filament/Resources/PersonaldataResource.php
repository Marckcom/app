<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonaldataResource\Pages;
use App\Filament\Resources\PersonaldataResource\RelationManagers;
use App\Models\Personal;
use App\Models\Personaldata;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonaldataResource extends Resource
{
    protected static ?string $model = Personal::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'PERSONAL';
    protected static ?string $modelLabel = 'DIRECCION';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Select::make('personals_id')
                ->label('CEDULA')
                ->options(Personal::all()->pluck('cedula', 'id'))
                ->searchable(),

                Select::make('personals_id')
                ->label('NOMBRE')
                ->options(Personal::all()->pluck('names', 'id'))
                ->searchable(),

                Select::make('personals_id')
                ->label('APELLIDOS')
                ->options(Personal::all()->pluck('lastnames', 'id'))
                ->searchable(),

                ////////////////////////////////////////////////////////////

                TextInput::make('pais')
                ->label('PAIS')
                ->placeholder('PARAGUAY'), 

                TextInput::make('departamento')
                ->label('DEPARTAMENTO')
                ->placeholder('ITAPUA'), 

                TextInput::make('ciudad')
                ->label('CUIDAD')
                ->placeholder('FERNANDO DE LA MORA'), 

                TextInput::make('barrio')
                ->label('BARRIO')
                ->placeholder('SAN PABLO'), 

                TextInput::make('direccion')
                ->label('DIRECCION')
                ->placeholder('MASKOI C/ ATYRA'), 

                TextInput::make('referencia')
                ->label('REFERENCIAS')
                ->placeholder('EDIFICIO CHACOMER'), 

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('grados.name')
                ->label('GRADO')
                ->searchable() 
                ->sortable(),
                TextColumn::make('armas.name')
                ->label('ARMA')
                ->searchable() 
                ->sortable(),
                TextColumn::make('names')
                ->label('NOMBRES')
                ->searchable() 
                ->sortable(),
                TextColumn::make('lastnames')
                ->label('APELLIDOS')
                ->searchable() 
                ->sortable(),
                TextColumn::make('cedula')
                ->label('CEDULA')
                ->searchable() 
                ->sortable(),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePersonaldatas::route('/'),
        ];
    }
}
