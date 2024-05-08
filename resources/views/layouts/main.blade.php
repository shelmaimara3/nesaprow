<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>NesaProw</title>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('css/output2.css') }}" rel="stylesheet">
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">
    @include('layouts.partials.sidebar')
    
    @yield('container')
    
    </section>
    <script>
        function toggleMaxHeight(button) {
            const menuDropdown = button.parentElement;
            menuDropdown.classList.toggle('max-h-fit');
            menuDropdown.classList.toggle('shadow-[0_10px_16px_0_#0A090B0D]');
            menuDropdown.classList.toggle('z-10');
        }

        document.addEventListener('click', function(event) {
            const menuDropdowns = document.querySelectorAll('.menu-dropdown');
            const clickedInsideDropdown = Array.from(menuDropdowns).some(function(dropdown) {
                return dropdown.contains(event.target);
            });
            
            if (!clickedInsideDropdown) {
                menuDropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('max-h-fit');
                    dropdown.classList.remove('shadow-[0_10px_16px_0_#0A090B0D]');
                    dropdown.classList.remove('z-10');
                });
            }
        });
    </script>
</body>
</html>