<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="signup" class="flex flex-col md:flex-row w-full min-h-screen md:min-h-screen">
        <nav class="flex items-center px-4 md:px-8 pt-4 md:pt-6 w-full absolute top-0">
            <div class="flex items-center">
                <a href="{{ route('front.index') }}">
                    <img src="{{asset('assets/logo/logo-nesaprow-black.svg')}}" alt="logo">
                </a>
            </div>
            <div class="hidden md:flex items-center justify-end w-full">
                <ul class="flex items-center gap-4 md:gap-6">
                    <li class="h-12 flex items-center">
                        <a href="{{ route('login') }}" class="font-semibold text-white px-4 py-2 bg-[#0A090B] rounded-full text-center">Sign In</a>
                    </li>
                </ul>
            </div>
            <div class="md:hidden flex w-full justify-end">
                <a href="{{ route('login') }}" class="md:hidden text-white px-4 py-2 bg-[#0A090B] rounded-full">Sign In</a>
            </div>
        </nav>
        <div class="left-side flex flex-col w-full pb-2 md:pb-4 px-4 md:px-4">
            <div class="flex flex-col items-center justify-center pt-14 md:pt-20 gap-8 md:gap-10">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="flex flex-col gap-4 md:gap-6 w-full max-w-md mx-auto">
                    @csrf
                    <h1 class="font-bold text-lg md:text-2xl">Sign Up</h1>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold">Complete Name</p>
                        <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/profile.svg')}}" class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write your username" name="name">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold">Email Address</p>
                        <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/sms.svg')}}" class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="email" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write your email here" name="email">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold">Avatar</p>
                        <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/note-add.svg')}}" class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="file" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="avatar">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p  class="font-semibold">Password</p>
                        <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/lock.svg')}}" class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="password" id="password" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write your password here" name="password" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold" for="password_confirmation">Confirm Password</p>
                        <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/lock.svg')}}" class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="password" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write your confirm password here" id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full h-[52px] p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Create My Account</button>
                </form>
            </div>
        </div>
        <div class="right-side flex flex-col w-full md:w-[760px] bg-[#6436F1] pb-4 md:pb-8 pt-18 md:pt-32 px-4 md:px-8">
            <div class="flex flex-col items-center justify-center pt-12 md:pt-18 gap-8 md:gap-10">
                <div class="w-full h-72 md:h-96 flex-shrink-0 overflow-hidden">
                    <img src="{{asset('images/thumbnail/sign-in2-illustration.png')}}" class="w-full h-full object-contain" alt="banner">
                </div>
                <div class="logos w-full overflow-hidden">
                    <div class="group/slider flex flex-nowrap w-max items-center">
                        <div
                            class="logo-container animate-[slide_15s_linear_infinite] group-hover/slider:pause-animate flex gap-10 pl-10 items-center flex-nowrap">
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                        </div>
                        <div
                            class="logo-container animate-[slide_15s_linear_infinite] group-hover/slider:pause-animate flex gap-10 pl-10 items-center flex-nowrap">
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                            <div class="w-fit flex shrink-0">
                                <img src="{{ asset('assets/logo/logo-nesaprow-white.svg')}}" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>