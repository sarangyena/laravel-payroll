<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="register">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full uppercase" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- User ID -->
        <div class="mt-4">
            <x-input-label for="userId" :value="__('User ID:')" />
            <x-text-input id="userId" class="block mt-1 w-full uppercase" type="text" name="userId" :value="old('userId')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('userId')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#register').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Loop through each text field with the class "uppercase"
                $('.uppercase').each(function() {
                    // Convert the value to uppercase
                    var inputValue = $(this).val().toUpperCase();
                    // Set the uppercase value back to the text field
                    try{
                        $(this).val(inputValue);
                    }catch(error){
                        console.error("An error occurred:", error.message);
                    }
                });

                // Submit the form programmatically
                this.submit();
            });
        })
    </script>
</x-guest-layout>
