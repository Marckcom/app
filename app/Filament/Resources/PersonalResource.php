<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalResource\Pages;
use App\Filament\Resources\PersonalResource\RelationManagers;
use App\Models\Armas;
use App\Models\Categoria;
use App\Models\Cuadro;
use App\Models\Estado;
use App\Models\Fuerza;
use App\Models\Grados;
use App\Models\Infopersonal;
use App\Models\Personal;
use DateTime;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;

class PersonalResource extends Resource
{
    protected static ?string $model = Personal::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $modelLabel = 'AGG PERSONAL'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("DATOS MILITARES")->description('REGISTRAR NUEVO PERSONAL')
                    ->schema([
                        Select::make('categorias_id')
                        ->label('CATEGORIA')
                        ->options(Categoria::all()->pluck('name', 'id'))
                        ->searchable(),
                        Select::make('cuadros_id')
                        ->label('CUADRO DE')
                        ->options(Cuadro::all()->pluck('name', 'id'))
                        ->searchable(),

                        Select::make('grados_id')
                        ->label('GRADO')
                        ->options(Grados::all()->pluck('name', 'id'))
                        ->searchable(),

                        Select::make('fuerzas_id')
                        ->label('FUERZA')
                        ->options(Fuerza::all()->pluck('name', 'id'))
                        ->searchable(),

                        Select::make('armas_id')
                        ->label('ARMA')
                        ->options(Armas::all()->pluck('name', 'id'))
                        ->searchable(),

                        Select::make('estados_id')
                        ->label('ESTADO')
                        ->options(Estado::all()->pluck('name', 'id'))
                        ->searchable(),

                    ])->columnSpan(2)->columns(2),

                    //AQUI SE ITRODUCE LA IMAGEN DEL USUARIO A LA DERECHA DE LOS DATOS SELECT

                Section::make("FOTO DEL PERSONAL")
                    ->schema([
                        FileUpload::make('image')
                        ->columnSpan(3)
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        //->multiple()
                        ->enableDownload(),
                    ])->columnSpan(1),


                Section::make("REGISTRAR NUEVO PERSONAL")
                    ->schema([
                        TextInput::make('names')
                         ->label('NOMBRES')
                         ->placeholder('MARCOS ABEL'), 
                          
                        TextInput::make('lastnames')
                            ->label('APELLIDOS')
                            ->placeholder('MERELES RUIZ DIAZ'),

                        DatePicker::make('birthday')
                            ->label('FECHA DE CUMPLEAÑOS'),

                        TextInput::make('gender')
                            ->label('GENERO')
                            ->placeholder('MASCULINO, FEMENINO')
                            ->datalist([
                                'MASCULINO',
                                'FEMENINA',
                            ]),

                        TextInput::make('estado')
                            ->label('ESTADO CIVIL')
                            ->placeholder('CASDO, SOLETERO, VIUDO'), 
                        
                        TextInput::make('cedula')
                            ->label('N° CEDULA')
                            ->placeholder('6555442'),

                        TextInput::make('cimilitar')
                            ->label('N° CEDULA MILITAR')
                            ->placeholder('14-6481-07'),

                        TextInput::make('lnacimiento')
                            ->label('LUGAR DE NACIMIENTO')
                            ->placeholder('ENCARNACION'),

                        TextInput::make('phone')
                            ->label('NUMERO DE TELEFONO')
                            ->placeholder('0993538224'),

                        TextInput::make('celular')
                            ->label('NUMERO DE TELEFONO ALTERNATIVO') 
                            ->placeholder('0994563221'),

                        TextInput::make('email')
                            ->label('CORREO ELECTRONICO')
                            ->placeholder('mmereles@ffmm.mil.py'),

                        TextInput::make('fegreso')
                            ->label('FECHA DE EGREGO O INCORPORACION')
                            ->placeholder('22-12-1992'),

                        TextInput::make('decreto')
                            ->label('NUMERO DE DECRETO DE NOMBRAMIENTO')
                            ->placeholder('22-12-1992'),



                    ])->columnSpan(3)->columns(2),

                    //AQUI SE INTRODUCE LAS IMAGENES DE LOS DOCUMUENTOS

                    Section::make("CARGAR ARCHIVOS DIGITALES")
                    ->schema([
                        FileUpload::make('cifilemilitar')
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        ->nullable()
                        ->enableDownload()
                        ->label('CEDULA MILITAR ADELANTE')
                        ->placeholder('CARGUE LA IMAGEN AQUI'),

                        FileUpload::make('cifilemilitar_dos')
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        ->nullable()
                        ->enableDownload()
                        ->label('CEDULA MILITAR ATRAS')
                        ->placeholder('CARGUE LA IMAGEN AQUI'),

                        FileUpload::make('cifile')
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        ->nullable()
                        ->enableDownload()
                        ->label('CEDULA CIVIL ADELANTE')
                        ->placeholder('CARGUE LA IMAGEN AQUI'),
                        
                        FileUpload::make('cifile_dos')
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        ->nullable()
                        ->enableDownload()
                        ->label('CEDULA CIVIL ATRAS')
                        ->placeholder('CARGUE LA IMAGEN AQUI'),

                        FileUpload::make('decretofile')
                        ->disk('public')
                        ->directory('files')
                        ->openable()
                        //->multiple()
                        ->nullable()
                        ->enableDownload()
                        ->label('DECRETO N° ARCHIVO PDF')
                        ->placeholder('CARGUE SU DECRETO AQUI'),


                    ])->columnSpan(3)->columns(2),


            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->description("DATOS DEL PERSONAL MILITAR")->columns([
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
            'index' => Pages\ManagePersonals::route('/'),
        ];
    }
}
