@extends('layouts.main')

@section('container')

<div id="menu-content" class="flex flex-col w-full pb-[30px]">
    @include('layouts.partials.navbar')

    <div class="flex flex-col gap-10 px-5 mt-5">
        <div class="breadcrumb flex items-center gap-[30px]">
            <a href="{{ route('dashboard.categories.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Categories</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Update Category</a>
        </div>
    </div>
    <div class="header flex flex-col gap-1 px-5 mt-5">
        <h1 class="font-extrabold text-[30px] leading-[45px]">Update Category</h1>
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

            <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.categories.update', $category) }}" class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
                @csrf
                @method('PUT')
                <div class="flex gap-5 items-center">
                    <input type="file" name="icon" id="icon" class="peer hidden" onchange="previewFile()" data-empty="true">
                    <div class="relative w-[100px] h-[100px] rounded-full overflow-hidden">
                        <div class="relative file-preview z-10 w-full h-full">
                            <img src="{{Storage::url($category->icon)}}" class="thumbnail-icon w-full h-full object-cover" alt="icon">
                        </div>
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-center font-semibold text-sm text-[#7F8190]">Icon <br>Course</span>
                    </div>
                    <button type="button" class="flex shrink-0 p-[8px_20px] h-fit items-center rounded-full bg-[#0A090B] font-semibold text-white" onclick="document.getElementById('icon').click()">
                        Add Icon
                    </button>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Category Name</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input value="{{ $category->name }}" type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Write here" name="name" required>
                    </div>
                </div>
                
                <div class="flex items-center gap-5">
                    <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Save</button>
                </div>
            </form>
</div>
<script>
    function previewFile() {
        var preview = document.querySelector('.file-preview');
        var fileInput = document.querySelector('input[type=file]');

        if (fileInput.files.length > 0) {
            var reader = new FileReader();
            var file = fileInput.files[0]; // Get the first file from the input

            reader.onloadend = function () {
                var img = preview.querySelector('.thumbnail-icon'); // Get the thumbnail image element
                img.src = reader.result; // Update src attribute with the uploaded file
                preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
            }

            reader.readAsDataURL(file);
            fileInput.setAttribute('data-empty', 'false');
        } else {
            preview.classList.add('hidden'); // Hide preview if no file selected
            fileInput.setAttribute('data-empty', 'true');
        }
    }
</script>
@endsection