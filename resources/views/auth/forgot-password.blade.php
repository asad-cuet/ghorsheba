<x-base-layout>
<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Reset Password</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
      <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                                <div class="thinborder-ontop">
                                       <h4>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</h4>
                                       @if (session('status'))
                                       <div class="mb-4 font-medium text-sm text-green-600">
                                           <h4>session('status')</h4>
                                       </div>
                                       @endif

                                    <x-jet-validation-errors class="mb-4" />
                                    <form id="userloginform" method="POST" accept="{{route('login')}}">   
                                        @csrf                                     
                                        <div class="block">
                                         <x-jet-label for="email" value="{{ __('Email') }}" />
                                      <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                   </div>

                                <div class="flex items-center justify-end mt-4">
                                 <x-jet-button>
                                  {{ __('Email Password Reset Link') }}
                               </x-jet-button>
                                    </div>
                                    </form>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </section>
        
</x-base-layout>


        