<div>
    <div class="grid grid-cols-2 gap-5">
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Firstname" wire:model="firstname"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('firstname')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Middlename" wire:model="middlename"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('middlename')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Lastname" wire:model="lastname"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('lastname')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Age" wire:model="age"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('age')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Sex" wire:model="sex"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('sex')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="text" placeholder="Phone Number" wire:model="phone_number"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('phone_number')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full  col-span-2">
            <input type="text" placeholder="Address" wire:model="address"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('address')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="mail" placeholder="Email" wire:model="email"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('email')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">

        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="password" placeholder="Password" wire:model="password"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('password')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full max-w-xs mx-auto">
            <input type="password" placeholder="Confirm Password" wire:model="confirm_password"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-400 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
            <div>
                @error('confirm_password')
                    <span class="text-sm text-red-500"> {{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4" wire:click="register">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</div>
