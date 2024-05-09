<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('css/output2.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black font-poppins pt-10 pb-[50px]">
    <div id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 pb-[50px] bg-[url('{{asset('assets/background/Nesaprow-banner.png')}}')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
        <nav class="flex justify-between items-center py-6 px-[50px]">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo-nesaprow.svg')}}" alt="logo">
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="{{ route('front.index') }}" class="font-semibold">Home</a>
                </li>
                <li>
                    <a href="#Top-Categories" class="font-semibold">Categories</a>
                </li>
                <li>
                    <a href="#Popular-videos" class="font-semibold">
                        Course
                    </a>
                </li>
                <li>
                    <a href="#benefits" class="font-semibold">Benefits</a>
                </li>
                <li>
                    <a href="#developer" class="font-semibold">Developer</a>
                </li>
            </ul>
            @auth
            <div class="flex gap-[10px] items-center">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                </div>
                <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="photo">
                    </a>
                </div>
            </div>
            @endauth
            @guest
            <div class="flex gap-[10px] items-center">
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#5B6592]">Sign Up</a>
                <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#5B6592] transition-all duration-300 hover:shadow-[0_10px_20px_0_#5B659280]">Sign In</a>
            </div>
            @endguest
        </nav>
        <div class="flex flex-col items-center gap-[30px]">
            <div class="w-fit flex items-center gap-3 p-2 pr-6 rounded-full bg-[#FFFFFF1F] border border-[#3477FF24]">
                <div class="w-[100px] h-[48px] flex shrink-0">
                    <img src="{{asset('assets/icon/avatar-group.png')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-semibold text-sm text-white">Join for know more</p>
            </div>
            <div class="flex flex-col gap-[10px]">
                <h1 class="font-semibold text-[80px] leading-[82px] text-left gradient-text-hero">Nesaprow</h1>
                <p class="text-center text-xl leading-[36px] text-[#F5F8FA] hidden">Nesaprow menyediakan kursus online berkualitas <br> bagi Anda untuk <br> meningkatkan kompetensi siswa SMK <br> dan mendalami tentang pemrograman web</p>
                
            </div>
            <div class="flex gap-6 w-fit">
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#5B6592] transition-all duration-300 hover:shadow-[0_10px_20px_0_#5B659280]">Join Now</a>
            </div>
        </div>
    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Browse Courses</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-[30px]">
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">HTML</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-4.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">CSS</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-2.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">JavaScript</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-3.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Post-Test</p>
            </a>
        </div>

    </section>
    <section id="Popular-videos" class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Video Courses</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Don’t Missed It, Learn Now</h2>
            </div>
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                <img src="{{asset('assets/icon/arrow-right.svg')}}" alt="icon">
            </button>
            <button class="btn-prev absolute -right-[52px] top-[216px]">
                <img src="{{asset('assets/icon/arrow-right.svg')}}" alt="icon">
            </button>
            <div id="course-slider" class="w-full">

                @forelse($courses as $course)
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{ route('dashboard.details.video', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{ route('dashboard.details.video', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}
                            </a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->students->count() }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold"></p>
                                    <p class="text-[#6D7786]">{{ $course->category->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p>
                        Belum ada kelas terbaru.
                    </p>
                @endforelse
            </div>
        </div>
    </section>
    <section id="benefits" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Benefit</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Benefit</h2>
                    <p class="text-lg text-[#475466]">It’s time to upgrade skills without limits!</p>
                </div>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Tujuan Pembelajaran Pemrograman Web</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{asset('assets/icon/add.svg')}}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Menerapkan format teks dalam script HTML, CSS, dan Javascript dalam program tampilan halaman web interaktif.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">Fitur - fitur Unggulan</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{asset('assets/icon/add.svg')}}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">1. Fitur Modul <br> 2. Fitur Tonton Video Pembelajaran
                            <br>3. Upload Proyek dan Status
                            <br>4. Post-Test & Report Siswa</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Kompetensi Awal</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{asset('assets/icon/add.svg')}}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">1. Siswa memahami struktur dasar dokumen HTML, CSS, dan konsep bahasa pemrograman JavaScript.                
                            <br> 2.	Siswa mampu menyusun konten dengan menggunakan desain visual yang menarik dan responsif dengan menggunakan kombinasi HTML, CSS, dan JavaScript.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="developer" class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="{{asset('assets/logo/logo-nesaprow-black.svg')}}" alt="logo">
                </div>
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Products</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Online Courses</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Expert Handbook</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Company</p>
                <ul class="flex flex-col gap-[14px]">
                    <li class="flex items-center gap-[10px]">
                        <a href="" class="text-[#6D7786]">Careers</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Resources</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Help Center</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">&copy; {{ date('Y') }} Nesaprow created by Shelma. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>