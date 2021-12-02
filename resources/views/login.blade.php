<div class="modal1 mfp-hide" id="modal-register">
    <div class="card mx-auto" style="max-width: 540px;">
        <div class="card-header py-3 bg-transparent center">
            <h3 class="mb-0 fw-normal">Hello, Welcome Back</h3>
        </div>
        <div class="card-body mx-auto py-5" style="max-width: 70%;">

            <a href="#" class="button button-large w-100 si-colored si-facebook nott fw-normal ls0 center m-0"><i class="icon-facebook-sign"></i> Log in with Facebook</a>

            <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

            <x-guest-layout>


                    <x-jet-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col-12">
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="col-12 mt-4">
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>


                <div class="col-12">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="col-12 mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>


        </x-guest-layout>


        </div>
        <div class="card-footer py-4 center">
            <p class="mb-0">Don't have an account? <a href="/register"><u>Sign up</u></a></p>
        </div>
    </div>
</div>
