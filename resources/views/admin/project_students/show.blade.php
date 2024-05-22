@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="{{ route('dashboard.project_students.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Project</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Details Project</a>
                </div>
            </div>
            
            <div class="header flex flex-col gap-1 px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Details Project Student</h1>
            </div>
            <div class="flex flex-wrap justify-center px-5 mt-[30px] gap-[30px]">
                <div class="flex flex-row w-full">
                    <!-- Kolom 1 -->
                    <div class="flex flex-col gap-y-5 w-1/2">
                            <p class="text-slate-500 text-sm">Student</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->user->name }}</h3>
            
                            <p class="text-slate-500 text-sm">Nama Kelompok</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->name_team }}</h3>
            
                            <p class="text-slate-500 text-sm">Jabatan dalam Tim</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->occupation->name }}</h3>
            
                            <p class="text-slate-500 text-sm">Anggota Kelompok</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->member }}</h3>
            
                            <p class="text-slate-500 text-sm">Tema Proyek</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $projectStudent->title_project }}</h3>
                        
                    </div>
            
                    <!-- Kolom 2 -->
                    <div class="flex flex-col gap-y-5 w-1/2">
                            <p class="text-slate-500 text-sm">File Proyek</p>
                            @if($projectStudent)
                                <h3 class="text-indigo-950 text-xl font-bold"><a href="{{ Storage::url($projectStudent->proof_project) }}" target="_blank">Unduh Proyek</a></h3>
                            @else
                                <h3 class="text-indigo-950 text-xl font-bold">Belum ada file yang diunggah.</h3>
                            @endif
            
                            <p class="text-slate-500 text-sm">Deadline</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($projectStudent->deadline)->format('F j, Y') }}</h3>
            
                            <p class="text-slate-500 text-sm">Created At</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($projectStudent->created_at)->format('F j, Y') }}</h3>
            
                            <div>
                                <form action="{{ route('dashboard.project_students.update', $projectStudent) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <p class="text-slate-500 text-sm">Skor</p>
                                    <div class="flex items-center w-1/2 h-[52px] p-[14px_16px] rounded-full border border-[#182841] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B] mt-3">
                                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                                        </div>
                                        <input type="text" class="text-indigo-950 text-xl font-bold w-full outline-none" name="score" value="{{ $projectStudent->score }}" required>
                                    </div>
                                    <p class="text-slate-500 text-sm mt-3">Status</p>
                                    @if($projectStudent->is_done)
                                        <h3 class="text-[#39A611] text-xl font-bold mt-3">Sudah Direview</h3>
                                    @else
                                        <h3 class="text-[#F60B0B] text-xl font-bold mt-3">Pending</h3>
                                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full mt-3 w-1/2">
                                            Approve Project
                                        </button>
                                    @endif
                                </form>
                            </div>
                    </div>
                </div>
            </div>
                       
        </div>
@endsection