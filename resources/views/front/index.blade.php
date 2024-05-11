<!doctype html>
<html class="scroll-smooth">
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
    <div id="hero-section" class="max-w-[1280px] mx-auto w-full flex flex-col gap-10 pb-[50px] bg-[url('{{asset('assets/background/Nesaprow-Banner2.png')}}')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
            <div class="container">
                <nav class="flex justify-between items-center py-6 px-[20px] md:px-[50px]">
                    <a href="{{ route('front.index') }}">
                        <img src="{{ asset('assets/logo/logo-nesaprow.svg')}}" alt="logo">
                    </a>
                    
                    <ul class="hidden md:flex items-center gap-[30px] text-white">
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
                        <div class="w-[40px] h-[40px] md:w-[56px] md:h-[56px] overflow-hidden rounded-full flex shrink-0">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="photo">
                            </a>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="flex flex-col md:flex-row items-center gap-4 md:gap-0">
                        <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] md:mr-4 ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#5B6592] mb-4 md:mb-0 md:mr-0">Sign Up</a>
                        <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#5B6592] transition-all duration-300 hover:shadow-[0_10px_20px_0_#5B659280]">Sign In</a>
                    </div>
                    @endguest
                </nav>
            </div>
        

        <div class="flex flex-col items-center gap-[30px] px-[20px] md:px-[50px]">
            <div class="w-fit md:w-auto flex items-center gap-3 p-2 pr-6 rounded-full bg-[#FFFFFF1F] border border-[#3477FF24]">
                <div class="w-[60px] h-[30px] md:w-[100px] md:h-[48px] flex shrink-0">
                    <img src="{{asset('assets/icon/avatar-group.png')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-semibold text-sm text-[#5B6592]">Join for know more</p>
            </div>
            <div class="flex flex-col gap-[10px] text-center md:text-left">
                <h1 class="font-semibold text-[32px] leading-[34px] md:text-[80px] md:leading-[82px] gradient-text-hero">Nesaprow</h1>
                <p class="font-semibold text-center md:text-left text-md leading-[20px] text-[#F5F8FA] hidden md:block">Nesaprow menyediakan kursus online berkualitas <br> untuk meningkatkan kompetensi siswa SMK <br> dalam mendalami tentang pemrograman web</p>
                
            </div>
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[10px_20px] md:p-[16px_32px] bg-[#5B6592] transition-all duration-300 hover:shadow-[0_10px_20px_0_#5B659280]">Join Now</a>
            </div>
        </div>
    </div>

    <section id="Top-Categories" class="max-w-[1280px] mx-auto flex flex-col p-6 md:p-[70px_50px] gap-6 md:gap-12">
        <div class="flex flex-col gap-6">
            <div class="gradient-badge w-fit p-2 md:p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-2 md:gap-6">
                <div>
                    <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                </div>
                <p class="font-medium text-sm md:text-lg text-[#FF6129]">Top Categories</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-2xl md:text-[40px] leading-[2.5] md:leading-[60px]">Browse Courses</h2>
                <p class="text-[#6D7786] text-base md:text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-12">
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#5B6592] transition-all duration-300">
                <div class="w-14 h-14 md:w-[70px] md:h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-base md:text-lg">HTML</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#5B6592] transition-all duration-300">
                <div class="w-14 h-14 md:w-[70px] md:h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-4.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-base md:text-lg">CSS</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#5B6592] transition-all duration-300">
                <div class="w-14 h-14 md:w-[70px] md:h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-2.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-base md:text-lg">Javascript</p>
            </a>
            <a href="#" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#5B6592] transition-all duration-300">
                <div class="w-14 h-14 md:w-[70px] md:h-[70px] flex shrink-0">
                    <img src="{{asset('assets/icon/Web Development 1-3.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-base md:text-lg">Post-Test</p>
            </a>
        </div>
    </section>

    <section id="Popular-videos" class="max-w-[1280px] mx-auto flex flex-col p-6 md:p-[70px_82px_0px] gap-6 md:gap-12 bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-6 items-center text-center">
            <div class="gradient-badge p-2 md:p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-2 md:gap-6">
                <div>
                    <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                </div>
                <p class="font-medium text-sm md:text-lg text-[#FF6129]">Popular Video Courses</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-2xl md:text-[40px] leading-[2.5] md:leading-[60px]">Don’t Missed It, Learn Now</h2>
            </div>
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-10 md:-left-[52px] top-8 md:top-[216px]">
                <img src="{{asset('assets/icon/arrow-right.svg')}}" alt="icon">
            </button>
            <button class="btn-prev absolute -right-10 md:-right-[52px] top-8 md:top-[216px]">
                <img src="{{asset('assets/icon/arrow-right.svg')}}" alt="icon">
            </button>
            <div id="course-slider" class="w-full">

                @forelse($courses as $course)
                <div class="course-card w-full md:w-1/2 lg:w-1/3 px-3 pb-6 mt-2">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#5B6592]">
                        <a href="{{ route('dashboard.details.video', $course->slug) }}" class="thumbnail h-48 md:h-[200px] lg:h-[200px] rounded-10 overflow-hidden">
                            <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-4 md:gap-8">
                            <a href="{{ route('dashboard.details.video', $course->slug) }}" class="font-semibold text-base md:text-lg line-clamp-2 hover:line-clamp-none min-h-14 lg:min-h-[56px]">{{ $course->name }}
                            </a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                    @endfor
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->students->count() }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 md:w-8 md:h-8 lg:w-8 lg:h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{ Storage::url($course->category->icon) }}" class="w-full h-full object-cover" alt="icon">
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

    <section id="benefits" class="max-w-[1280px] mx-auto flex flex-col p-6 md:p-[70px_50px] gap-6 md:gap-12">
        <div class="flex flex-col md:flex-row md:justify-between">
            <div class="flex flex-col gap-2 md:gap-4">
                <div class="gradient-badge w-fit p-2 md:p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-2 md:gap-6">
                    <div>
                        <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                    </div>
                    <p class="font-medium text-sm md:text-lg text-[#FF6129]">Benefit</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold text-3xl leading-[2.5] md:leading-[4rem]">Benefit</h2>
                    <p class="text-base md:text-lg text-[#475466]">Keunggulan dalam Nesaprow</p>
                </div>
            </div>
            <br>
            <div class="flex flex-col gap-4 md:gap-8 w-full md:w-[552px] shrink-0">
                <div class="flex flex-col p-4 md:p-5 rounded-lg bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#5B6592] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Tujuan Pembelajaran Pemrograman Web</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{asset('assets/icon/add.svg')}}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Menerapkan format teks dalam script HTML, CSS, dan Javascript dalam program tampilan halaman web interaktif.</p>
                    </div>
                </div>
                <div class="flex flex-col p-4 md:p-5 rounded-lg bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#5B6592] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between items-center" data-accordion="accordion-faq-2">
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
                <div class="flex flex-col p-4 md:p-5 rounded-lg bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#5B6592] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between items-center" data-accordion="accordion-faq-3">
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

    <footer id="developer" class="max-w-[1280px] mx-auto flex flex-col p-6 md:p-[70px_50px] gap-6 md:gap-12 bg-[#F5F8FA] rounded-lg">
        <div class="flex flex-col md:flex-row md:justify-between">
            <a href="#" class="md:self-start mb-4 md:mb-0">
                <img src="{{asset('assets/logo/logo-nesaprow-black.svg')}}" alt="logo">
            </a>
            
            <div class="flex flex-col gap-4 md:gap-5">
                <p class="font-semibold text-base md:text-lg">Products</p>
                <ul class="flex flex-col gap-3 md:gap-5">
                    <li>
                        <a href="#Popular-videos" class="text-[#6D7786]">Online Courses</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Expert Handbook</a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="flex flex-col gap-4 md:gap-5">
                <p class="font-semibold text-base md:text-lg">Institution</p>
                <ul class="flex flex-col gap-3 md:gap-5">
                    <li class="flex items-center gap-2">
                        <a href="https://www.unesa.ac.id/" class="text-[#6D7786]">State University of Surabaya</a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="flex flex-col gap-4 md:gap-5">
                <p class="font-semibold text-base md:text-lg">Developer</p>
                <ul class="flex flex-col gap-3 md:gap-5">
                    <li class="flex items-center">
                        <a href="https://www.linkedin.com/in/shelma-imara-bakir/" class="text-[#6D7786]">About me</a>
                        <div class="md:ml-3 gradient-badge w-fit p-[6px_10px] rounded-full border border-[#FED6AD] flex items-center">
                            <a href="https://www.instagram.com/shelmaimara/" class="font-medium text-xs text-[#FF6129]">Contact me</a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <a href="https://github.com/shelmaimara3" class="text-[#6D7786]">Portofolio & many more</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-10 md:h-12 flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-xs md:text-sm text-[#6D7786] tracking-wider">&copy; {{ date('Y') }} Nesaprow created by Shelma. All Rights Reserved.</p>
        </div>
    </footer>
    <div class="container mx-auto">
        <div class="w-10 h-10  bg-blue-200 rounded-full flex fixed bottom-5 right-5 cursor-pointer">
            <a href="#" class="text-xl m-auto">
                🔝
            </a>
        </div>
    </div>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>