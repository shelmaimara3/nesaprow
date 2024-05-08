@extends('layouts.main')

@section('container')
        
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.courses.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Courses</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Course Students</a>
                </div>
            </div>
            <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                <div class="flex gap-6 items-center">
                    <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                        <img src="{{Storage::url($course->cover)}}" class="w-full h-full object-contain" alt="icon">
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
                                <p class="font-semibold">{{ count($students) }} students</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="course-test" class="mx-[70px] w-[870px] mt-[30px]">
                <h2 class="font-bold text-2xl">Students</h2>
                <div class="flex flex-col gap-5 mt-2">

                    @forelse($students as $student)
                    <div class="student-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                        <div class="flex gap-4 items-center">
                            <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('images/photos/default-photo.svg')}}" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">{{ $student->name }}</p>
                                <p class="text-[#7F8190]">{{ $student->email }}</p>
                            </div>
                        </div>

                        @if($student->status == 'Passed')
                            <div class="flex items-center gap-[14px]">
                                <p class="p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[#06BC65] outline-dashed outline-[2px] outline-offset-[4px] mr-[6px]">Passed</p>
                            </div>
                        @elseif($student->status == 'Not Started')
                            <div class="flex items-center gap-[14px]">
                                <p class="p-[6px_10px] rounded-[10px] bg-indigo-950 font-bold text-xs text-white outline-indigo-950 outline-dashed outline-[2px] outline-offset-[4px] mr-[6px]">Not Started</p>
                            </div>
                        @elseif($student->status == 'Not Passed')
                            <div class="flex items-center gap-[14px]">
                                <p class="p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white outline-[#FD445E] outline-dashed outline-[2px] outline-offset-[4px] mr-[6px]">Not Passed</p>
                            </div>
                        @endif

                    </div>
                    @empty
                        <p>
                            Belum ada student yang ditambahkan pada kelas ini.
                        </p>
                    @endforelse

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