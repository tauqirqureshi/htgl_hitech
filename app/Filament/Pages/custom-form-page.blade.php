<x-filament::page>
    <div>
        <button wire:click="$set('isFormOpen', true)">Open Form</button>
    </div>

    

    @if($isFormOpen)

    <X-filament-panels::form>
        {{$this->form}}
    </X-filament-panels::form>
        <!-- <form wire:submit.prevent="submit">
            <div>
                {{ $this->form->field('product') }}
            </div>
            <div>
                {{ $this->form->field('no_of_tickets') }}
            </div>
            <div>
                <x-filament-support::button type="submit">Submit</x-filament-support::button>
            </div>
            <div>
                <button wire:click="$set('isFormOpen', false)">Close Form</button>
            </div>
        </form> -->
    @endif
</x-filament::page>