@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="{{ route('dashboard') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.project') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Kembali</a>
                </div>
            </div>

            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                @forelse($projectGuides as $projectGuide)
                <p class="font-bold text-[20px] leading-[25px]">Baca dan cermati dengan seksama panduan proyek berikut untuk mengerjakan proyek kelompok.</p>
                <p class="font-semibold text-slate-500 text-sm">{{ $projectGuide->name }}</p>
                @if($projectGuide->guide_project)
                    <iframe src="{{ Storage::url($projectGuide->guide_project) }}" width="100%" height="700px"></iframe>
                @else
                    <p>No PDF available</p>
                @endif
                @empty
                    <p>
                        Panduan proyek belum ditambahkan.
                    </p>
                @endforelse
                
            </div>

        </div>

@endsection