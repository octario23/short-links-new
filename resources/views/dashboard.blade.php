<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    You're logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
            <div id="signup-create-page" class="page container-fluid">
                <div class="row justify-content-center py-5">
                    <div class="col-xl-8">

                        <div class="card lfp-card-2 p1">
                            <div class="card-body">
                                <form method="POST" action="#" class="px-md-2 px-lg-5">
                                    @csrf
                                    <div class="form-row justify-content-center">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="first_name">First Name</label>
                                                <input id="first_name" type="text" placeholder="First Name"
                                                       class="form-control lfp-input @error('first_name') is-invalid @enderror"
                                                       name="first_name" value="{{ old('first_name') }}" required autofocus>
                                                @error('first_name')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-auto"></div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="last_name">Last Name</label>
                                                <input id="last_name" type="text" placeholder="Last Name"
                                                       class="form-control lfp-input @error('last_name') is-invalid @enderror"
                                                       name="last_name" value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Email</label>
                                                <input id="email" type="email" placeholder="Email Address"
                                                       class="form-control lfp-input @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-auto"></div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="phone">Phone Number</label>
                                                <input id="phone" type="text" placeholder="Phone"
                                                       class="form-control lfp-input @error('phone') is-invalid @enderror"
                                                       name="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="street1">Street Address</label>
                                                <input id="street1" type="text" placeholder="Street Address"
                                                       class="form-control lfp-input @error('street1') is-invalid @enderror"
                                                       name="street1" value="{{ old('street1') }}">
                                                @error('street1')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-auto"></div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="city">City</label>
                                                <input id="city" type="text" placeholder="City"
                                                       class="form-control lfp-input @error('city') is-invalid @enderror"
                                                       name="city" value="{{ old('city') }}">
                                                @error('city')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="state_abbr">State</label>
                                                <input id="state_abbr" type="text" placeholder="State"
                                                       class="form-control lfp-input @error('state_abbr') is-invalid @enderror"
                                                       name="state_abbr" value="{{ old('state_abbr') }}">
                                                @error('state_abbr')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-auto"></div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="sr-only" for="zipcode">Zipcode</label>
                                                <input id="zipcode" type="text" placeholder="Zip Code"
                                                       class="form-control lfp-input @error('zipcode') is-invalid @enderror"
                                                       name="zipcode" value="{{ old('zipcode') }}">
                                                @error('zipcode')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="sr-only" for="npn">NPN Number</label>
                                                <input id="npn" type="text" placeholder="NPN Number"
                                                       class="form-control lfp-input @error('npn') is-invalid @enderror"
                                                       name="npn"
                                                       value="{{ old('npn') }}" required>
                                                @error('npn')
                                                <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md-11">
                                            <div class="row justify-content-center">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox custom-checkbox">
                                                            <input name="agreed_to_terms"
                                                                   class="custom-control-input lfp-checkbox-input @error('agreed_to_terms') is-invalid @enderror"
                                                                   type="checkbox" id="agreed_to_terms" required>
                                                            <label class="custom-control-label lfp-checkbox-label"
                                                                   for="agreed_to_terms">
                                                                I understand and agree to the
                                                                <a href="https://www.fusemind.com/privacy.html"
                                                                   class="lfp-a text-dark"
                                                                   target="_blank" rel="noopener">
                                                                    Privacy Policy
                                                                </a>
                                                                and
                                                                <a href="https://www.fusemind.com/terms.html"
                                                                   class="lfp-a text-dark"
                                                                   target="_blank" rel="noopener">
                                                                    Terms of Service
                                                                </a>
                                                                .
                                                            </label>
                                                            @error('agreed_to_terms')
                                                            <p class="invalid-feedback"><strong>{{ $message }}</strong></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center">
                                        <div class="col-md-11 align-self-center">
                                            <div class="row justify-content-center">
                                                <div class="form-group row m-0 justify-content-end">
                                                    <button type="submit" class="btn lfp-btn">{{__("SIGN UP")}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
