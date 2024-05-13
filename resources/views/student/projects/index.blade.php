@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">New Project</p>
                        <a href="{{ route('dashboard.project.details_guide') }}" class="h-[52px] p-[14px_20px] bg-blue-500 rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Cek Panduan</a>
                    </div>
                    
                    <a href="{{ route('dashboard.project.create') }}" class="h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Add New Project</a>
                    
                    </div>
            </div>

            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
            
                    <div class="flex shrink-0 w-[200px]">
                        <p class="text-[#7F8190]">Nama</p>
                    </div>
                    <div class="flex shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Tema Proyek</p>
                    </div>
                    
                    <div class="flex justify-center shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Deskripsi proyek</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Date Created</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[170px]">
                        <p class="text-[#7F8190]">Deadline</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[170px]">
                        <p class="text-[#7F8190]">Status</p>
                    </div>
                </div>

                @forelse($projects as $project)
                <div class="list-items flex flex-nowrap justify-between pr-10">
                    <div class="flex shrink-0 w-[200px]">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">{{ $project->name_team }}</p>
                                <p>{{ $project->user->name }}</p>
                                <p>{{ $project->occupation->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-bold text-lg">{{ $project->title_project }}</p>
                    </div>
                    <div class="flex shrink-0 w-[120px] items-center justify-center">
                        <p class="font-bold text-sm">{{ $project->desc_project }}</p>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($project->created_at)->format('F j, Y') }}
                        </p>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold text-[#F60B0B]">
                            {{ \Carbon\Carbon::parse($project->deadline)->format('F j, Y') }}
                        </p>
                    </div>

                    @if($project->is_done)
                    <div class="flex shrink-0 w-[170px] items-center justify-center">
                        <p class="p-[8px_16px] rounded-full bg-[#EDFFE6] font-bold text-sm text-[#39A611]">Sudah Direview</p>
                    </div>
                    @else
                    <div class="flex shrink-0 w-[170px] items-center justify-center">
                        <p class="p-[8px_16px] rounded-full bg-[#FFE6E6] font-bold text-sm text-[#F60B0B]">Pending</p>
                    </div>
                    @endif
            
                </div>
                @empty
                <p>
                    Belum ada project yang dikumpulkan.
                </p>
                @endforelse

            </div>

        </div>
@endsection