@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="{{ route('dashboard.modul') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Course Modul</a>
                </div>
            </div>

            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                @forelse($course->course_moduls as $modul)
                <p class="font-bold text-[20px] leading-[25px]">{{ $modul->name }}</p>
                <p class="font-semibold text-slate-500 text-sm">{{ $modul->course->name }}</p>
                @if($modul->path_modul)
                    <iframe src="{{ Storage::url($modul->path_modul) }}" width="100%" height="700px"></iframe>
                @else
                    <p>No PDF available</p>
                @endif
                @empty
                    <p>
                        Modul belum ditambahkan.
                    </p>
                @endforelse
                
            </div>
        </div>
@endsection