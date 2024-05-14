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
                        <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Course Video</a>
                    </div>
                </div>
                
                <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                    <div class="flex gap-6 items-center">
                        <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                            <img src="{{ Storage::url($courseVideo->course->cover) }}" class="w-full h-full object-contain">
                        </div>
                        <div class="flex flex-col gap-5">
                            <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $courseVideo->course->name }}</h1>
                            <div class="flex items-center gap-5">
                                <div class="flex gap-[10px] items-center">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{asset('images/icons/note-text.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-semibold">{{ $courseVideo->course->category->name }}</p>
                                </div>
                                <div class="flex gap-[10px] items-center">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{asset('images/icons/calendar-add.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-semibold">{{ \Carbon\Carbon::parse($courseVideo->created_at)->format('F j, Y') }}</p>
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
                    <h2 class="font-bold text-2xl">Course Video</h2>
                    <p>
                        <h3 class="font-semibold">Panduan Insert Link Youtube</h3>
                        - Path Video isi dengan embed link video youtube setelah tanda (=) terdapat 11 karakter <br>
                        - Contoh 1 : youtube.com/watch?v=<strong><i>iILFBGm_I9M</i></strong> <br>
                        - Contoh 2 : youtube.com/watch?v=<strong><i>I5kj-YsmWjM</i></strong><u>&t=3s</u> (tidak disertakan) 
                    </p>
                    <div class="flex flex-col gap-[30px] mt-2">
                        <form method="POST" action="{{ route('dashboard.course_videos.update', $courseVideo) }}" class="mx-[70px] mt-[30px] flex flex-col gap-5">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col gap-[10px]">
                                <p class="font-semibold">Name</p>
                                <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                                    <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                        <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                                    </div>
                                    <input value="{{ $courseVideo->name }}" type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="name" required>
                                </div>
                            </div>
                            <div class="flex flex-col gap-[10px]">
                                <p class="font-semibold">Path Video</p>
                                <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                                    <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                        <img src="{{asset('images/icons/video-library.svg')}}" class="w-full h-full object-contain" alt="icon">
                                    </div>
                                    <input value="{{ $courseVideo->path_video }}" type="text" id="path_video" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"  name="path_video" :value="old('path_video')" required>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Update
                                Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

