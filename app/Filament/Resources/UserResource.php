<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Toggle;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Hash;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Toggle::make('is_active')->required()->label('تفعيل'),
                Forms\Components\Toggle::make('is_admin')->required()->label('أدمن '),

                Forms\Components\TextInput::make('name')->required()->label('اسم العضو '),
                Forms\Components\TextInput::make('password')->password()->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)),
                SpatieMediaLibraryFileUpload::make('img_profile')->collection('categories')->label('الصورة'),
                Forms\Components\TextInput::make('email')->unique(ignoreRecord: true)->required()->label('الايميل')->email(),
                Forms\Components\TextInput::make('profit_ratio')->required()->label('نسبة الربح'),
                Forms\Components\TextInput::make('address')->label('عنوان العضو')->placeholder('العنوان'),
                Forms\Components\TextInput::make('balance')->numeric()->required()->label('الرصيد')->default(0),
                Forms\Components\CheckboxList::make('roles')
                    ->options(\Spatie\Permission\Models\Role::all()->pluck("name", "id"))->relationship('roles','name'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')->label('الاسم')->sortable()->searchable(),
                SpatieMediaLibraryImageColumn::make('img_profile')->collection('categories')->label('الصورة'),
                Tables\Columns\TextColumn::make('email')->label('ايميل')->sortable()->searchable(),
                Tables\Columns\BooleanColumn::make('is_active')->label('مفعل')->sortable()->searchable(),
                Tables\Columns\BooleanColumn::make('is_admin')->label('أدمن')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('profit_ratio')->label('نسبة الربح')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('address')->label('العنوان')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('balance')->label('الرصيد')->sortable()->searchable(),

            ])
            ->filters([

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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
