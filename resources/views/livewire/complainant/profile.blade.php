<div>
    <div class=" p-5 rounded-xl border">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-6">
            <x-primary-button wire:click="updateProfile">
                {{ __('Update Profile') }}
            </x-primary-button>
        </div>
    </div>
</div>
