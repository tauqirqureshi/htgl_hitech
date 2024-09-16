<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->label('Name')->required(),
				TextInput::make('hitech_no')->label('HiTech No'),
                TextInput::make('indian_name')->label('Indian Name'),
				TextInput::make('species')->label('Species'),
				ColorPicker::make('color')->label('Color'),
                TextInput::make('size')->label('Size'),
				TextInput::make('shape')->label('Shape'),
				TextInput::make('weight')->label('Weight'),
                TextInput::make('ri')->label('R.I'),
                TextInput::make('sg')->label('S.G'),
                TextInput::make('hardness')->label('Hardness'),
                TextInput::make('making')->label('Making'),                
                TextInput::make('xrays')->label('X-Rays'),
                TextInput::make('natural_face')->label('Natural Faces'),
                TextInput::make('treatment')->label('Treatment'),
                TextInput::make('inclusion')->label('Inclusion'),
				TextInput::make('stone_name')->label('Stone Name'),
				TextInput::make('comment')->label('Comment'),                				
                FileUpload::make('image')->label('Product Image')->disk('public')->directory('image')->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make("name")->label('Name')->sortable()->searchable(),
				TextColumn::make('hitech_no')->label('HiTech No')->sortable()->searchable(),
                TextColumn::make('indian_name')->label('Indian Name')->sortable()->searchable(),
				TextColumn::make('species')->label('Species')->sortable()->searchable(),
                ColorColumn::make("color")->label('Color')->sortable()->searchable(),
                TextColumn::make('size')->label('Size')->sortable()->searchable(),
                TextColumn::make('shape')->label('Shape')->sortable()->searchable(),
                TextColumn::make('weight')->label('Weight')->sortable()->searchable(),
                TextColumn::make('ri')->label('R.I')->sortable()->searchable(),
                TextColumn::make('sg')->label('S.G')->sortable()->searchable(),
                TextColumn::make('hardness')->label('Hardness')->sortable()->searchable(),
                TextColumn::make('making')->label('Making')->sortable()->searchable(),
                TextColumn::make('xrays')->label('X-Rays')->sortable()->searchable(),
                TextColumn::make('natural_face')->label('Natural Faces')->sortable()->searchable(),
                TextColumn::make('treatment')->label('Treatment')->sortable()->searchable(),
                TextColumn::make('inclusion')->label('Inclusion')->sortable()->searchable(),
                TextColumn::make('stone_name')->label('Stone Name')->sortable()->searchable(),
				TextColumn::make('comment')->label('Comment')->sortable()->searchable(),
                ImageColumn::make('image')->label('Product Image')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}