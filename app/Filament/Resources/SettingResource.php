<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;



class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('اسم الموقع'),

                Forms\Components\TextInput::make('profit_rate')->numeric()->minValue(0)->required()->label('نسبة الربح بالمئة'),

                Forms\Components\TextInput::make('phone_number') ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')->label('رقم الهاتف'),

                Forms\Components\TextInput::make('api_key')->required()->label('API'),
                Forms\Components\TextInput::make('facebook')->required()->label('حساب الفيسبوك'),
                Forms\Components\TextInput::make('email')->required()->email()->label('البريد الالكتروني'),
                Forms\Components\TextInput::make('address')->required()->label('العنوان'),
                SpatieMediaLibraryFileUpload::make('logo')->collection('categories')->label('الصورة'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('اسم الموقع')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->label('رقم الهاتف')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('facebook')->label('حساب الفيسبوك ')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->label('البريد الالكتروني')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('address')->label('العنوان')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('profit_rate')->label('نسبة الربح')->sortable()->searchable(),
                SpatieMediaLibraryImageColumn::make('logo')->collection('categories')->label('الصورة'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
