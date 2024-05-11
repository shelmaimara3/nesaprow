<div id="sidebar" class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
    <div class="w-full flex flex-col gap-[30px]">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-center">
            <img src="{{asset('assets/logo/logo-nesaprow-black.svg')}}" alt="logo">
        </a>
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
            </li>
                
                <a href="{{ route('dashboard') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/home-hashtag.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                </a>
            </li>
            @role('teacher')
            <li>
                <a href="{{ route('dashboard.categories.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/categories*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/code.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Categories</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.courses.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/courses*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/bill.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Courses</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.students.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/students*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/profile-2user.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Students</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.teachers.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/teachers*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/profile.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Teachers</p>
                </a>
            </li>
        </ul>
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
            </li>
            <li>
                <a href="{{ route('dashboard.project_students.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/project*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/3dcube.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Project Student</p>
                </a>
            </li>
            @endrole

            @role('student')
            
            <li>
                <a href="{{ route('dashboard.modul') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/modul*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/note-text.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Modul</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.video') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/video*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/bill.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Course Video</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.project') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/project*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/3dcube.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Project Student</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.learning.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 {{ Request::is('dashboard/learning*') ? 'bg-[#8046FD]' : '' }} transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/note-favorite-outline.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Post Test</p>
                </a>
            </li>
            @endrole

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <button type="submit" class="w-full p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#8046FD]">
                    <div>
                        <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                    </div>
                    <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                </button>
            </form>
            </li>
        </ul>
    </div>
</div>