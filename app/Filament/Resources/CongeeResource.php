<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CongeeResource\Pages;
use App\Filament\Resources\CongeeResource\RelationManagers;
use App\Models\Congee;
use App\Models\employee;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;


class CongeeResource extends Resource
{
    protected static ?string $model = Congee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              
                Card::make()->schema([
                    Select::make('employee_id',)->relationship('employee','Nom'),
                    Select::make('typecongee_id',)->relationship('typecongee','nom'),
                    TextInput::make('nbr jours')->required(),
                    TextInput::make('annee')->required(),
                    DatePicker::make('Date debut')->displayFormat('d/m/Y'),
                    DatePicker::make('Date fin')->displayFormat('d/m/Y')
                    
    
                ])
                
              
            ]);
        
          
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            
 
                TextColumn::make('id')->label('id')->sortable(),
                TextColumn::make('employee.الاسم')->label('الاسم الموضف ')->sortable(),
                TextColumn::make('typecongee.nom')->label('نوع الرخصة')->sortable(),
                TextColumn::make('Date debut')->label('تاريخ ايقاف')->sortable(),
                TextColumn::make('Date debut')->label(' تاريخ استئناف')->sortable(),
                TextColumn::make('annee')->label(' السنة')->sortable(),
                TextColumn::make('nbr jours')->label('امد')->sortable()
                

            ])
            ->filters([
                SelectFilter::make('employee')->relationship('employee', 'الاسم'),
                SelectFilter::make('typecongee')->relationship('typecongee', 'nom')
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
            'index' => Pages\ListCongees::route('/'),
            'create' => Pages\CreateCongee::route('/create'),
            'edit' => Pages\EditCongee::route('/{record}/edit'),
        ];
    }    
}
