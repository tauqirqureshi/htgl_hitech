<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
// use Dompdf\Dompdf;
// use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
// use BaconQrCode\Renderer\RendererStyle\RendererStyle;
// use BaconQrCode\Writer;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }
    public static function canCreate(): bool
    {
       return false;
    }

    public static function canEdit($record): bool
    {
       return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make("product.name")->sortable()->searchable(),
                TextColumn::make("certificate_no")->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\PdfAction::make(),
                Tables\Actions\Action::make('redirectToTicket')
        ->icon('heroicon-o-arrow-right')
        ->label('Go to Ticket')
        ->action(function (Ticket $record) {
            // Log the redirection action
            info('Redirecting to Ticket ID: ' . $record->certificate_no);

            // Redirect to the ticket URL
            return redirect()->to('/qrcodeview/' . $record->certificate_no);
        }),
                Tables\Actions\Action::make('saveAnother')
                ->icon('heroicon-o-document-duplicate')
                ->label('Download PDF')
                ->action(function (Ticket $record) {
                    // Log the ID
                    info('ID: ' .$record);
                    $record->QR= QrCode::format('png')->size(256)->generate('Make me into a QrCode!');
                    $record->redirectUrl=url('/Ticket/' . $record->certificate_no);
                     info('URL: ' .$record->redirectUrl);
                    $record->QRImage = "data:image/png;base, $record->QR";
                    // info('QR: ' .$record->QR);
                    // $pdfContent = TicketResource::generatePdf($record);
                    // info('QRImage: ' .$record->QRImage);
                    $record->image=base64_encode(url('/storage/' . $record->product->image));
                    info('URL: ' .$record->image);
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
        // Output the generated PDF
        // $dompdf->output();
        return response()->streamDownload(function () use ($record) {

            echo Pdf::loadHtml(
                Blade::render('pdf',['record' => $record])
            )->stream();
        }, $record->certificate_no . '.pdf');
                    // $pdf = Pdf::loadView('pdf');
                    //
                    //     // info('ID: ' .$pdf);
                    //     $pdf->download();
                    //     return Pdf::loadView('pdf')->stream();
                    // Perform your save and create logic here
                    // For example:
                    // $record = Ticket::findOrFail($id);
                    // $record->status = 'draft';
                    // $record->save();

                    // Send notification

                })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('export')
                ->label('View Selected Ticket')
                ->button()
                // ->icon('heroicon-o-document-download')
                ->action(function ($records) {
                    // Log the number of records selected
                    info('Number of records selected for export: ' . count($records));

                    // Perform the export operation here
                    // This is just an example of how you might start this process

                    // Collect the IDs of the selected records
                    $ids = collect($records)->pluck('id')->implode(',');
                    info('Comma-separated IDs: ' . $ids);
                    // Send success notification

                    return redirect()->to('/admin/qrcodeview?id=' . $ids);
                    Notification::make()
                        ->title('Export completed successfully')
                        ->success()
                        ->send();

                    // Optional: Return a response or redirect after the action
                    return back();
                })
                    // BulkAction::make('export')->button()->action('saveAndCreateAnother'),
                ]),


            ]);
    }

public static function generatePdf($record)
{
    // Load the HTML content for the PDF
    info('pdf -ID: ' .$record);
    $data=[
        "certificate_no"=>"ssss",
    ];
    $html = view('pdf',$data)->render();

    // Create a new Dompdf instance
    $dompdf = new Dompdf();

    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF
    return $dompdf->output();
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
            // 'pdf' => Pages\PdfTicket::route('/{record}/pdf'),
        ];
    }
    public function saveAndCreateAnother()
    {
        // Your logic for saving and creating another record goes here
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
            // return;
    }



    public function download() {

    }

    // public function saveAndCreateAnother(TableAction $action)
    // {
    //     // Your logic for saving and creating another record goes here
    //     Notification::make()
    //         ->title('Saved successfully')
    //         ->success()
    //         ->send();
    //         return;
    // }


}