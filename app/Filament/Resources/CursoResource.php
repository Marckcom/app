<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursoResource\Pages;

use App\Filament\Resources\CursoResource\RelationManagers;
use App\Models\Curso;
use App\Models\Personal;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CursoResource extends Resource
{
    protected static ?string $model = Personal::class;
    //protected static ?string $model = Curso::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'PERSONAL';
    protected static ?string $modelLabel = 'CURSOS';

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

                    TextInput::make('name')
                    ->label('NOMBRE DEL CURSO')
                    ->placeholder('PARACAIDISTA'),


                    TextInput::make('tipe')
                    ->label('TIPO DE CURSO')
                    ->datalist([
                        'MILITAR',
                        'CIVIL',
                    ]), 

                    TextInput::make('institucion')
                    ->label('REALIZADO EN LA INSTITUCION')
                    ->placeholder('ESCUELA DE INFANTERIA'), 

                    TextInput::make('duracion')
                    ->label('DURACION DEL CURSO')
                    ->placeholder('TRES MESES'), 

                    TextInput::make('documento')
                    ->label('DOCUMENTO CURSO')
                    ->placeholder('ORDEN GENERAL 22/24'),
           
                    FileUpload::make('file')
                    ->disk('public')
                    ->directory('files')
                    ->openable()
                    ->nullable()
                    ->enableDownload()
                    ->label('PDF DEL DOCUMENTO')
                    ->placeholder('CARGUE LA IMAGEN AQUI'),

                    FileUpload::make('certificate')
                    ->disk('public')
                    ->directory('files')
                    ->openable()
                    ->nullable()
                    ->enableDownload()
                    ->label('CERTIFICADO OPTENIDO')
                    ->placeholder('CARGUE SU CERTICADO EN PDF'),

            ]);
            
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
            'index' => Pages\ManageCursos::route('/'),
        ];
    }
}

