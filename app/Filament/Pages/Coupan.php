<?php

namespace App\Filament\Pages;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

use App\Models\Ticket;
use App\Models\Product;
use Carbon\Carbon;

class Coupan extends Page implements Forms\Contracts\HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public ?array $data = [];

    protected static string $view = 'filament.pages.coupan';
    protected static string $resource = CustomPage::class;
    protected static ?string $title = 'Generate Ticket';



    public function mount()
    {
        $this->form->fill();
        // Log::info(Product::all()->plick('name'));
        $ProductData = Product::all()->toArray();

        function myfunction($item)
        {
            return [$item["id"] => $item["name"]];
        }

        Log::info(array_map(function($num) {
            return [$num['id'] => $num['name']];
        }, $ProductData));
        $ProductData =array_map(function($num) {
            return [$num['id'] => $num['name']];
        }, $ProductData);

    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                // Select::make('product')->options([
                //     'draft' => 'Draft',
                //     'reviewing' => 'Reviewing',
                //     'published' => 'Published',
                //     'draft' => 'Draft',
                //     'reviewing' => 'Reviewing',
                //     'published' => 'Published',
                // ])->required(),
                Select::make('product')->options(Product::all()->pluck('name','id'))->required(),

                TextInput::make('no_of_ticket')->numeric()->step(5),
            ])->statePath('data');;
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            // Log::info("Data". print_r($data));
            Log::info("Form submitted with product: {$this->form->getState()['product']} and number of tickets: {$this->form->getState()['no_of_ticket']}");
            // session()->flash('success', 'Form submitted successfully!');
            $insertData= [];

            for ($i = 0; $i < $data["no_of_ticket"]; $i++) {
                $det = rand(10,100);
                // echo $det . "\n";
                Log::info($det);
                $check = array_filter($insertData, function ($item) use ($det) {
                    return isset($item["ticket_number"]) && $item["ticket_number"] == $det;
                });
                // echo $det . "\n";
                Log::info($det);

                if (count($check) > 0) {
                    while (count($check) > 0) {
                        $det = rand(10,100);
                        $check = array_filter($insertData, function ($item) use ($det) {
                            return isset($item["ticket_number"]) && $item["ticket_number"] == $det;
                        });
                        if (count($check) === 0) {
                            break;
                        }
                        Log::info($det);


                        // echo $det . "\n";
                    }
                }
                $now = Carbon::now();
                $unique_code = $now->format('Hisu');

                Log::info("id");
                Log::info($unique_code);

                $ticket = Ticket::create([
                    'product_id' => $data["product"],
                    'certificate_no' => $unique_code,
                ]);

            }
            ;
            Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
            $this->form->fill();
        } catch (Halt $exception) {
            return;
        }
        return;
    }


}
