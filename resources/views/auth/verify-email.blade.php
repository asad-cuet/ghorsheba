<x-base-layout>
   
    
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Login</li>
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
                                    <h4>Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</h4>
                                    <x-jet-validation-errors class="mb-4" />
                                    @if (session('status') == 'verification-link-sent')
                                    
                                          <h4>A new verification link has been sent to the email address you provided in your profile settings.</h4>
                                      
                                    @endif
                                    <form method="POST" action="{{ route('verification.send') }}">
                                         @csrf
                                        <div>
                                           <x-jet-button type="submit">
                                                   {{ __('Resend Verification Email') }}
                                           </x-jet-button>
                                       </div>
                                   </form>
                                </div>                                
                            </div>
                            <div>
                                

                               <form method="POST" action="{{ route('logout') }}" class="inline">
                                  @csrf

                                   <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                                        {{ __('Log Out') }}
                                   </button>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </section>
    
</x-base-layout>


       