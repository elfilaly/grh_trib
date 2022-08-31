<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('nom')->required(),
                TextInput::make('الاسم')->required(),
               TextInput::make('Numero financier')->required(),
                TextInput::make('cin')->required(),
                TextInput::make('telephone')->required(),
               	
                DatePicker::make('date_naissance')->displayFormat('d/m/Y')->required(),
                DatePicker::make('date_embauche')->displayFormat('d/m/Y')->required(),
                DatePicker::make('date_embauche_tribunal')->displayFormat('d/m/Y')->required(),
                TextInput::make('adresse')->required(),     
                Select::make('service_id',)->relationship('service','Nom'),
                Select::make('taches_id',)->relationship('taches','الاطار'),
                /*Select::make('المستوى-الدراسي')
                ->options([
                    
                                    'BAC' => 'BAC',
                                    'BAC+2' => 'BAC+2',
                                    'BAC+3' => 'BAC+3',
                                    'BAC+5' => 'BAC+5',
                ]), */
                
                Select::make('situtaion familiale')
->options([
    
                    'عازب(ة)' => 'عازب(ة)',
                    'متزوج(ة)' => 'متزوج(ة)',
                    'مطلق(ة)' => 'مطلق(ة)',
])

            ])
            
          
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nom')->sortable()->searchable(),
                TextColumn::make('الاسم')->sortable()->searchable(),
                TextColumn::make('cin')->sortable(),
                TextColumn::make('Numero financier')->sortable(),
                TextColumn::make('telephone')->sortable(),
                TextColumn::make('date_naissance')->date(),
                TextColumn::make('date_embauche')->date(),
                TextColumn::make('date_embauche_tribunal')->date(),
                TextColumn::make('adresse')->sortable(),
                TextColumn::make('situtaion familiale')->sortable(),
                TextColumn::make('service.Nom')->sortable(),
                TextColumn::make('taches.الاطار')->sortable(),
                
            ])

            ->filters([
                SelectFilter::make('taches')->relationship('taches', 'الاطار'),
                SelectFilter::make('service')->relationship('service', 'Nom')
            ])
            ->actions([
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
