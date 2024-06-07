<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        .scroll-behavior {
            scroll-behavior: smooth;
        }

        /* Configure this in Tailwind.config.js */

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-in forwards;
        }

        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="scroll-smooth">
        <div class="fixed top-0 left-0 w-full bg-gray-800 p-4 text-white z-50">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="flex items-center gap-6">
                <div class="cursor-pointer">logo</div>
                <nav class="flex gap-4">
                    <a href="#home" class="px-4 py-2 border-b border-l border-gray-800 hover:border-b hover:border-l hover:border-gray-100 transition ease-in-out duration-300">Home</a>
                    <a href="#projects" class="px-4 py-2 border-b border-l border-gray-800 hover:border-b hover:border-l hover:border-gray-100 transition ease-in-out duration-300">Projects</a>
                    <a href="#portfolio" class="px-4 py-2 border-b border-l border-gray-800 hover:border-b hover:border-l hover:border-gray-100 transition ease-in-out duration-300">Portfolio</a>
                    <a href="#about" class="px-4 py-2 border-b border-l border-gray-800 hover:border-b hover:border-l hover:border-gray-100 transition ease-in-out duration-300">About</a>
                    <a href="#contact" class="px-4 py-2 border-b border-l border-gray-800 hover:border-b hover:border-l hover:border-gray-100 transition ease-in-out duration-300">Contact</a>
                </nav>
            </div>

        </div>

        <div class="">
            <div id="home" class="relative flex justify-center items-center min-h-screen bg-gray-500">
                <img src="{{ asset('images/bg-demo.jpeg') }}" class="absolute top-0 opacity-25" alt="" height="" width="100%">
                <div class="w-full flex items-center">
                    <div class="flex justify-center items-center w-1/2 h-[100vh] bg-gradient-to-r from-black to-transparent">
                        <div class="flex flex-col gap-4 w-10/12 text-white backdrop-blur p-10 rounded-lg">
                            <span class="text-6xl ">{{ __('Welcome to Dr Yew\'s Team Website') }}</span>
                        </div>
                    </div>
                    <div class="flex justify-center items-center w-1/2 h-[100vh] bg-gradient-to-l from-black to-transparent">
                        <div class="flex flex-col gap-4 w-2/3 text-white backdrop-blur p-10 rounded-lg">
                            <span class=" indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                            <span class=" indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                            <span class=" indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="projects" class="relative grid grid-cols-3 text-center gap-10 p-10 justify-center items-center min-h-screen bg-gray-600">
                <div class="show-on-scroll flex flex-col gap-4 p-10 text-center border-b-2 border-l-2 border-slate-400 hover:border-b-2  bg-slate-400 hover:scale-125 hover:translate-x-11 hover:-skew-y-3 transition ease-linear duration-250 hover:shadow-lg hover:rounded-2xl">
                    <span>Project's Title</span>
                    <span>Project's Description</span>
                    <span class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit expedita quam explicabo cum vel aspernatur quisquam, nobis labore eius est mollitia et, porro quaerat! Id tempora autem necessitatibus aliquam ratione?</span>
                </div>
                <div class="show-on-scroll flex flex-col gap-4 p-10 text-center border-b-2 border-l-2 border-slate-400 hover:border-b-2  bg-slate-400 hover:scale-125 transition ease-linear duration-250 hover:shadow-lg hover:rounded-2xl">
                    <span>Project's Title</span>
                    <span>Project's Description</span>
                    <span class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit expedita quam explicabo cum vel aspernatur quisquam, nobis labore eius est mollitia et, porro quaerat! Id tempora autem necessitatibus aliquam ratione?</span>
                </div>
                <div class="show-on-scroll flex flex-col gap-4 p-10 text-center border-b-2 border-l-2 border-slate-400 hover:border-b-2  bg-slate-400 hover:scale-125 hover:-translate-x-11 hover:skew-y-3 transition ease-linear duration-250 hover:shadow-lg hover:rounded-2xl">
                    <span>Project's Title</span>
                    <span>Project's Description</span>
                    <span class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit expedita quam explicabo cum vel aspernatur quisquam, nobis labore eius est mollitia et, porro quaerat! Id tempora autem necessitatibus aliquam ratione?</span>
                </div>
            </div>
            <div id="portfolio" class="relative flex justify-center items-center min-h-screen bg-green-300">
                portfolio
            </div>
            <div id="about" class="relative flex justify-center items-center min-h-screen bg-red-300">
                <img src="{{ asset('images/bg-about.jpeg') }}" class="absolute object-cover h-screen" alt="" height="100vh" width="">
                <div class="w-full flex items-center">
                    <div class="flex justify-center items-center w-1/2 h-[100vh] bg-gradient-to-r from-black to-transparent">
                        <div class="flex justify-center w-6/12 text-white backdrop-blur p-4 rounded-lg">
                            <span class="show-on-scroll text-6xl text-center">{{ __('About Teams') }}</span>
                        </div>
                    </div>
                    <div class="flex justify-center items-center w-1/2 h-[100vh] bg-gradient-to-l from-black to-transparent">
                        <div class="flex flex-col gap-4 w-2/3 text-white backdrop-blur p-10 rounded-lg">
                            <span class="show-on-scroll indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                            <span class="show-on-scroll indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                            <span class="show-on-scroll indent-8 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora sed veniam tempore, architecto mollitia odio totam tenetur illo hic asperiores quibusdam quasi nostrum doloribus nam iste quisquam obcaecati, officiis modi.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contact" class="relative flex justify-center items-center min-h-screen bg-yellow-300 ">
                contact
            </div>
        </div>
        <script>
            // Smooth scroll functionality
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            const callback = function (entries) {
                entries.forEach((entry) => {
                    console.log(entry);

                    if (entry.isIntersecting) {
                    entry.target.classList.add("animate-fadeIn");
                    } else {
                    entry.target.classList.remove("animate-fadeIn");
                    }
                });
            };

            const observer = new IntersectionObserver(callback);

            const targets = document.querySelectorAll(".show-on-scroll");
            targets.forEach(function (target) {
                target.classList.add("opacity-0");
                observer.observe(target);
            });

        </script>
    </body>
</html>
