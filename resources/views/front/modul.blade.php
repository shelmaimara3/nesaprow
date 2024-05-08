@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Course Modul</a>
                </div>
            </div>

            <div class="course-list-container flex flex-wrap justify-center px-5 mt-[30px] gap-[30px]">
                @forelse($courses as $course)
                <div class="course-card w-1/4 px-3 mt-2">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-[#f5f3f2] w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#6436F1]">
                        <a href="{{ route('dashboard.front.modul', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{ route('dashboard.front.modul', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}
                            </a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-cover" alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold"></p>
                                        <p class="text-[#6D7786]">{{ $course->category->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                
                                <a href="{{ route('dashboard.front.modul', $course->slug) }}" class="w-fit p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center align-middle">View Details</a>
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
@endsection