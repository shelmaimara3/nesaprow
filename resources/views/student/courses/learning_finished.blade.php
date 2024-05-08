@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="finished flex flex-col gap-[40px] items-center justify-center mt-[120px] mb-[30px] w-full">
                <div class="w-[200px] h-[200px] flex shrink-0 overflow-hidden">
                    <img src="{{Storage::url($course->cover)}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <div class="flex flex-col gap-[6px] justify-center text-center">
                    <h1 class="font-bold text-2xl">Congratulations! <br>You Have Finished Test</h1>
                    <p class="text-[#7F8190] w-[374px]">Hopefully you will get a better result to prepare your great future career soon enough</p>
                </div>
                <a href="{{ route('dashboard.learning.raport.course', $course) }}" class="w-fit p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center align-middle">View Test Result</a>
            </div>
        </div>
        
@endsection