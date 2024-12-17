<div>
    <div class="bg-white" x-data="{ open: false }">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-10 w-auto" src="{{ asset('images/lucena_logo.png') }}" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button x-on:click="open = true" type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#about" class="text-sm/6 font-semibold text-gray-900">About</a>
                    <a href="#service" class="text-sm/6 font-semibold text-gray-900">Services</a>
                    <a href="#faq" class="text-sm/6 font-semibold text-gray-900">FAQS</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div x-show="open" x-cloak class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div x-show="open" class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="{{ asset('images/lucena_logo.png') }}" alt="">
                        </a>
                        <button x-on:click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#about"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">About</a>
                                <a href="#service"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Services</a>
                                <a href="#faq"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Faq</a>

                            </div>
                            <div class="py-6">
                                <a href="{{ route('login') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="relative isolate px-6  lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:pt-48 lg:py-32">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Announcing our next round of funding. <a href="#"
                            class="font-semibold text-indigo-600"><span class="absolute inset-0"
                                aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <div class="text-center ">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">The Lucena
                        City Sanitary Landfill</h1>
                    <div class="mt-10  2xl:h-96 mb-10 2xl:mb-0 ">
                        <img src="https://www.lucenacity.gov.ph/wp-content/uploads/2021/03/environment.png"
                            alt="">
                    </div>

                </div>
                <div class="2xl:-mx-40 2xl:mt-10 space-y-5">
                    <p class="text-justify indent-10">About Lucena City's Solid Waste Management
                        Lucena City, the only highly urbanized area in Southern Tagalog, has made significant strides in
                        managing its growing waste challenges. As part of its commitment to environmental sustainability
                        and public health, the city converted its former open dumpsite in Barangay Mayao Kanluran into a
                        state-of-the-art sanitary landfill in 2017. This facility adheres to Republic Act 9003,
                        featuring a Materials Recovery Facility (MRF) for waste segregation and recycling. Notably,
                        recycled plastics are transformed into decorative bricks for local use, promoting a circular
                        economy.</p>
                    <p class="text-justify indent-10">With the involvement of over 300 workers and partnerships with
                        barangays, the program has set a
                        benchmark in Calabarzon, earning recognition for its innovative and exemplary practices.
                        Lucena’s solid waste initiatives also include plans for a city-wide 30% waste reduction goal
                        through enhanced household segregation efforts.</p>
                    <p class="text-justify indent-10">Lucena City continues to inspire other local governments with its
                        efforts to balance ecological
                        protection and sustainable development for its 300,000 residents</p>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
    <div class="relative isolate overflow-hidden bg-gray-300 py-24 sm:py-26" id="about">
        <img src="https://i.ytimg.com/vi/THMjVzVnW1Y/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCwyODmPW-2cO64aodvMVtl0bGuIA"
            alt=""
            class="absolute inset-0 -z-10 size-full opacity-10 object-cover object-right md:object-center">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="lg:mx-0">
                <h2 class="text-5xl font-semibold tracking-tight text-gray-700 sm:text-7xl">About Us</h2>
                <p class="mt-8 text-justify text-lg font-medium text-gray-700 sm:text-xl/8">Lucena City is the capital
                    of Quezon Province. It is classified as a highly urbanized city, and sustains a population of
                    278,924 as of 2020 census, divided into 33 barangays. Although geographically a part of Quezon
                    Province, it is politically independent from the latter.</p>
            </div>
            <div class="mt-10 grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-20 gap-10">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-5xl font-semibold tracking-tight text-gray-700 sm:text-7xl">Mission</h2>
                    <p class="mt-8 text-justify text-lg font-medium text-gray-700 sm:text-xl/8">Mission The City
                        Government
                        of Lucena shall uphold honest and transparent governance, boost investment opportunities,
                        improve
                        the quality of health and education, create employment through establishment of technological
                        and
                        agro-industries, ensure protection and sustainability of the environment, and promote peace and
                        order that will uplift the Lucenahins’ quality of life.</p>
                </div>
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-5xl font-semibold tracking-tight text-gray-700 sm:text-7xl">Vision</h2>
                    <p class="mt-8 text-justify text-lg font-medium text-gray-700 sm:text-xl/8">The City of Lucena,
                        imbued with strong and moral leadership, God-loving and empowered citizenry envisions to be the
                        premier city in Southern Tagalog providing sustainable development, creating opportunities for
                        socio-economic, agro-industrial and technological growth, ensuring a peaceful and safe
                        environment and improving the quality of life of its people.</p>
                </div>
            </div>
            <div class="mt-10">
                <h2 class="text-2xl font-semibold tracking-tight text-gray-700 sm:text-4xl">CITY ORDINANCE</h2>
                <div class="mt-2">
                    <button onclick="window.location.href='{{ asset('file/city-ordinance.pdf') }}'">
                        <div class="flex space-x-3 px-3 py-1.5  rounded-xl hover:bg-green-800 bg-green-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path d="M10 9H8" />
                                <path d="M16 13H8" />
                                <path d="M16 17H8" />
                            </svg>
                            <span>Download PDF File</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-gray-100" id="faq">
        <div class="relative  px-8 py-32 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid items-end grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <h2
                        class="text-xl leading-tight tracking-tight sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-base-900">
                        Feel Free To ask
                    </h2>
                    <p class="text-base leading-normal mt-4 text-base-500 font-medium">
                        Stay up to date with our latest news and updates.
                    </p>
                </div>
                <form class="w-full mt-8 sm:flex sm:max-w-md sm:ml-auto">

                    <div class="mt-2 sm:ml-2 sm:mt-0 sm:flex-shrink-0">
                        <a href="https://www.lucenacity.gov.ph/environment/"
                            class="flex bg-gray-600 items-center justify-center transition-all duration-200 focus:ring-2 focus:outline-none text-white bg-accent-600 hover:bg-accent-700 focus:ring-accent-500/50 h-10 px-6 py-3 text-base font-medium rounded-lg w-full sm:w-auto"
                            type="submit">
                            Visit Now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="px-8 py-12 mx-auto border-t md:px-12 lg:px-24 max-w-7xl relative">
            <div class="pt-6 mt-12  flex flex-col md:flex-row items-center justify-between">
                <a class="text-base leading-normal hover:text-accent-500 font-medium flex items-center gap-2 text-base-900"
                    href="#_">

                    SolidWasteManagement
                </a>
                <h2 class="text-sm leading-normal font-medium text-base-400">
                    Copyright © 2024 SWM. All rights reserved.
                </h2>
            </div>
        </div>
    </section>
</div>
