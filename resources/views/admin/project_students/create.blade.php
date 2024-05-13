@extends('layouts.main')

@section('container')
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.project_students.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Projects</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Guide Project Students</a>
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
                <h2 class="font-bold text-2xl">Upload Panduan Proyek Kelompok</h2>
                
                <div class="flex flex-col gap-[30px] mt-2">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.project.guide.save') }}" class="mx-[70px] mt-[30px] flex flex-col gap-5">
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
                            <p class="font-semibold">File Panduan (.pdf)</p>
                            <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                                <button type="button" onclick="document.getElementById('file').click()">
                                    <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                        <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">                        
                                        
                                    </div>
                                </button>
                                <input id="file" type="file" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="guide_project" class="hidden" onchange="updateFileName(this)">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Add
                            Guidance</button>
                    </form>

                    @forelse($projectGuides as $projectGuide)
                    <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                        <div class="question-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                            <div class="flex flex-col gap-[6px]">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $projectGuide->name }}</h3>
                                @if($projectGuide->guide_project)
                                    <iframe src="{{ Storage::url($projectGuide->guide_project) }}" width="100%" height="500px"></iframe>
                                @else
                                    <p>No PDF available</p>
                                @endif
                            </div>
                            <div class="flex items-center gap-[14px]">
                               <form method="POST" action="{{ route('dashboard.project_students.destroy', $projectGuide) }}">
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
                            Panduan proyek siswa belum di upload
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
@endsection