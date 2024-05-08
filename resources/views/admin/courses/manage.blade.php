@extends('layouts.main')

@section('container')
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div id="menu-content" class="flex flex-col w-full pb-[30px]">
                <div class="flex flex-col gap-10 px-5 mt-5">
                    <div class="breadcrumb flex items-center gap-[30px]">
                        <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                        <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                        <a href="{{ route('dashboard.courses.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Courses</a>
                        <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                        <a href="{{ route('dashboard.course.create.question', $course) }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Course Details</a>
                    </div>
                </div>
                
                <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                    <div class="flex gap-6 items-center">
                        <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                            <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-contain" alt="icon">
                            <p class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B] absolute bottom-0 transform -translate-x-1/2 left-1/2 text-nowrap">{{ $course->category->name }}</p>
                        </div>
                        <div class="flex flex-col gap-5">
                            <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
                            <div class="flex items-center gap-5">
                                <div class="flex gap-[10px] items-center">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{asset('images/icons/calendar-add.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-semibold">{{ \Carbon\Carbon::parse($course->created_at)->format('F j, Y') }}</p>
                                </div>
                                <div class="flex gap-[10px] items-center">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{asset('images/icons/profile-2user-outline.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-semibold">{{ count($students) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <a href="#" id="more-button" class="toggle-button w-[46px] h-[46px] flex shrink-0 rounded-full items-center justify-center border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/more.svg')}}" alt="icon">
                        </a>
                        <div class="dropdown-menu absolute hidden right-0 top-[66px] w-[270px] flex flex-col gap-4 p-5 border border-[#EEEEEE] bg-white rounded-[18px] transition-all duration-300 shadow-[0_10px_16px_0_#0A090B0D]">
                            <a href="{{ route('dashboard.course.course_students.create', $course) }}" class="flex gap-[10px] items-center">
                                <div class="w-5 h-5">
                                    <img src="{{asset('images/icons/profile-2user-outline.svg')}}" alt="icon">
                                </div>
                                <span class="font-semibold text-sm">Add Students</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="course-test" class="mx-[70px] w-[870px] mt-[30px]">
                    <h2 class="font-bold text-2xl">Course Tests</h2>
                    <div class="flex flex-col gap-[30px] mt-2">
                        <a href="{{ route('dashboard.course.create.question', $course) }}" class="w-full h-[92px] flex items-center justify-center p-4 border-dashed border-2 border-[#0A090B] rounded-[20px]">
                            <div class="flex items-center gap-5">
                                <div>
                                    <img src="{{asset('images/icons/note-add.svg')}}" alt="icon">
                                </div>
                                <p class="font-bold text-xl">New Question</p>
                            </div>
                        </a>
    
                        @forelse($questions as $question)
                        <div class="question-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                            <div class="flex flex-col gap-[6px]">
                                <p class="text-[#7F8190]">Question</p>
                                <p class="font-bold text-xl">{{ $question->question }}</p>
                            </div>
                            <div class="flex items-center gap-[14px]">
                                <a href="{{ route('dashboard.course_questions.edit', $question) }}" class="bg-[#0A090B] p-[14px_30px] rounded-full text-white font-semibold">Edit</a>
                                <form method="POST" action="{{ route('dashboard.course_questions.destroy', $question) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-[52px] h-[52px] flex shrink-0 items-center justify-center rounded-full bg-[#FD445E]">
                                        <img src="{{asset('images/icons/trash.svg')}}" alt="icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <p>
                            Kelas belum memiliki sebuah tes
                        </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('more-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');
        
            menuButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
            });
        
            // Close the dropdown menu when clicking outside of it
            document.addEventListener('click', function (event) {
            const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
            });
        });
    </script>
@endsection