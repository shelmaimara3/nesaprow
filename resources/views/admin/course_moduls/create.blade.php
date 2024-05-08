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
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Course Modul</a>
                </div>
            </div>

            <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                <div class="flex gap-6 items-center">
                    <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                        <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col gap-5">
                        <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
                        <div class="flex items-center gap-5">
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/icons/note-text.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold">{{ $course->category->name }}</p>
                            </div>
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
                                <p class="font-semibold">{{ $course->students->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="py-5 px-5 bg-red-700 text-white mt-3">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            @endif

            <div class="mx-[70px] w-[870px] mt-[30px]">
                <h2 class="font-bold text-2xl">Course Modul</h2>
                
                <div class="flex flex-col gap-[30px] mt-2">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.course.add_modul.save', $course->id) }}" class="mx-[70px] mt-[30px] flex flex-col gap-5">
                        @csrf
                        <div class="flex flex-col gap-[10px]">
                            <p class="font-semibold">Name</p>
                            <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                                <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                    <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                                </div>
                                <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write here" name="name" required>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[10px]">
                            <p class="font-semibold">File Modul (.pdf)</p>
                            <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                                <button type="button" onclick="document.getElementById('file').click()">
                                    <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                        <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">                        
                                        
                                    </div>
                                </button>
                                <input id="file" type="file" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="path_modul" class="hidden" onchange="updateFileName(this)">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Add
                            Modul</button>
                    </form>

                    @forelse($course->course_moduls as $modul)
                    <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                        <div class="question-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                            <div class="flex flex-col gap-[6px]">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $modul->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $modul->course->name }}</p>
                                @if($modul->path_modul)
                                    <iframe src="{{ Storage::url($modul->path_modul) }}" width="100%" height="500px"></iframe>
                                @else
                                    <p>No PDF available</p>
                                @endif
                            </div>
                            <div class="flex items-center gap-[14px]">
                               <form method="POST" action="{{ route('dashboard.course_moduls.destroy', $modul) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-[52px] h-[52px] flex shrink-0 items-center justify-center rounded-full bg-[#FD445E]">
                                        <img src="{{asset('images/icons/trash.svg')}}" alt="icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>
                        Modul belum ditambahkan.
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
@endsection