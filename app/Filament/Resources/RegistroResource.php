<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroResource\Pages;
use App\Filament\Resources\RegistroResource\RelationManagers;
use App\Models\Destino;
use App\Models\Doctipo;
use App\Models\Origen;
use App\Models\Registro;
use App\Models\Situacion;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroResource extends Resource
{
    protected static ?string $model = Registro::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $modelLabel = 'REGISTROS'; 

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Section::make()->columns(3)
                    ->schema([
                    Select::make('doctipos_id')
                    ->label('DOCUMENTO')
                    ->options(Doctipo::all()->pluck('name', 'id')),
                    Select::make('origens_id')
                    ->label('ORIGEN')
                    ->options(Origen::all()->pluck('name', 'id')),
                    Select::make('destinos_id')
                    ->label('DESTINO')
                    ->options(Destino::all()->pluck('name', 'id')),
                    TextInput::make('ndoc')
                    ->label('N° DOCS'),
                    TextInput::make('objeto')
                    ->label('OBJETO/ASUNTO'),                
                    Select::make('situacions_id')
                    ->label('SITUACION')
                    ->options(Situacion::all()->pluck('name', 'id')),
                    TagsInput::make('tags')
                    ->label('REMITIR A')
                    ->columnSpanFull(),
                    ]),
    
                    Section::make()
                    ->collapsed(true)
                    ->columns(3)
                    ->schema([
                    MarkdownEditor::make('content')
                    ->label('TEXTO OPCIONAL')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                ]),
                    FileUpload::make('file')
                    ->columnSpan(3)
                    ->label('CARGAR ARCHIVO DIGITAL')
                    ->disk('public')
                    ->directory('files')
                    ->openable()
                    //->multiple()
                    ->enableDownload(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('doctipos.name')
            ->label('DOCUMENTO')
            ->searchable() 
            ->sortable(),
            TextColumn::make('origens.name')
            ->label('ORIGEN')
            ->searchable() 
            ->sortable(),
            TextColumn::make('destinos.name')
            ->label('DESTINO')
            ->searchable() 
            ->sortable(),
            TextColumn::make('ndoc')
            ->label('N° DOC')
            ->searchable() 
            ->sortable(),
            TextColumn::make('objeto')
            ->label('OBJETO')
            ->searchable() 
            ->sortable(),
            //TextColumn::make('situacion')
            // ->label('SITUACION')
            //->searchable(),
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
            'index' => Pages\ManageRegistros::route('/'),
        ];
    }
}
