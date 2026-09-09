<nav
    x-data="{ open: false }"
    class="bg-white border-b border-gray-100"
>

    <!-- =========================================================
         BARRA PRINCIPAL
    ========================================================== -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- =================================================
                 IZQUIERDA
            ================================================== -->

            <div class="flex items-center">

                <!-- LOGO -->

                <div class="shrink-0 flex items-center">

                    <a
                        href="{{ route('dashboard') }}"
                        class="flex items-center"
                    >

                        <span class="text-xl font-bold text-gray-800">
                            SFA
                        </span>

                    </a>

                </div>


                <!-- =================================================
                     MENU PRINCIPAL
                ================================================== -->

                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-1">

                    <!-- DASHBOARD -->

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        {{ __('dashboard.title') }}
                    </x-nav-link>


                    <!-- RECORDS -->

                    <x-nav-link
                        :href="route('records.index')"
                        :active="request()->routeIs('records.*')"
                    >
                        {{ __('records.title') }}
                    </x-nav-link>


                    <!-- COMPAÑÍAS -->

                    <x-nav-link
                        :href="route('companies.index')"
                        :active="request()->routeIs('companies.*')"
                    >
                        {{ __('companies.title') }}
                    </x-nav-link>


                    <!-- REPORTES -->

                    <x-nav-link
                        :href="route('reports.index')"
                        :active="request()->routeIs('reports.*')"
                    >
                        {{ __('reports.title') }}
                    </x-nav-link>


                    <!-- BÚSQUEDA GLOBAL -->

                    <x-nav-link
                        :href="route('search.global')"
                        :active="request()->routeIs('search.global')"
                    >
                        {{ __('search.title') }}
                    </x-nav-link>

                </div>

            </div>


            <!-- =================================================
                 DERECHA
            ================================================== -->

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">


                <!-- =================================================
                     SELECTOR DE IDIOMA
                ================================================== -->

                <div
                    class="relative"
                    x-data="{ languageOpen: false }"
                >

                    <button
                        type="button"
                        @click="languageOpen = !languageOpen"
                        class="inline-flex items-center gap-2 px-3 py-2
                               border border-gray-200
                               rounded-md
                               text-sm font-medium
                               text-gray-600
                               bg-white
                               hover:bg-gray-50
                               hover:text-gray-800
                               transition"
                    >

                        @if(app()->getLocale() === 'en')

                            <span>
                                🇺🇸
                            </span>

                            <span>
                                English
                            </span>

                        @else

                            <span>
                                🇲🇽
                            </span>

                            <span>
                                Español
                            </span>

                        @endif


                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </button>


                    <!-- =================================================
                         OPCIONES DE IDIOMA
                    ================================================== -->

                    <div
                        x-show="languageOpen"
                        @click.outside="languageOpen = false"
                        x-transition
                        class="absolute right-0 mt-2 w-40
                               bg-white
                               border border-gray-200
                               rounded-lg
                               shadow-lg
                               z-50"
                    >

                        <!-- ESPAÑOL -->

                        <a
                            href="{{ route('language.change', ['locale' => 'es']) }}"
                            class="block w-full text-left px-4 py-3
                                   text-sm text-gray-700
                                   hover:bg-gray-50
                                   rounded-t-lg"
                        >

                            🇲🇽
                            <span>
                                Español
                            </span>

                        </a>


                        <!-- ENGLISH -->

                        <a
                            href="{{ route('language.change', ['locale' => 'en']) }}"
                            class="block w-full text-left px-4 py-3
                                   text-sm text-gray-700
                                   hover:bg-gray-50
                                   rounded-b-lg"
                        >

                            🇺🇸
                            <span>
                                English
                            </span>

                        </a>

                    </div>

                </div>


                <!-- =================================================
                     USUARIO
                ================================================== -->

                <x-dropdown
                    align="right"
                    width="48"
                >

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2
                                   border border-transparent
                                   text-sm leading-4 font-medium
                                   rounded-md text-gray-500
                                   bg-white
                                   hover:text-gray-700
                                   focus:outline-none
                                   transition ease-in-out duration-150"
                        >

                            <div class="text-left">

                                <div class="text-sm font-medium text-gray-700">

                                    {{ Auth::user()->name }}

                                </div>

                                <div class="text-xs text-gray-400">

                                    @if(Auth::user()->role === 'admin')

                                        {{ __('users.administrator') }}

                                    @else

                                        {{ __('users.general') }}

                                    @endif

                                </div>

                            </div>


                            <div class="ms-2">

                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >

                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0
                                           L10 10.586l3.293-3.293a1.414
                                           1.414 0 111.414 1.414l-4 4a1.414
                                           1.414 0 01-1.414 0l-4-4a1.414
                                           1.414 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />

                                </svg>

                            </div>

                        </button>

                    </x-slot>


                    <!-- =================================================
                         CONTENIDO DEL MENU
                    ================================================== -->

                    <x-slot name="content">


                        <!-- PERFIL -->

                        <x-dropdown-link
                            :href="route('profile.edit')"
                        >

                            {{ __('profile.page_title') }}

                        </x-dropdown-link>


                        <!-- =================================================
                             ADMINISTRACIÓN
                        ================================================== -->

                        @if(Auth::user()->role === 'admin')

                            <div class="border-t border-gray-100 my-1"></div>


                            <div class="px-4 py-2">

                                <span
                                    class="text-xs font-semibold
                                           text-gray-400 uppercase"
                                >
                                    {{ __('common.administration') }}

                                </span>

                            </div>


                            <!-- USUARIOS -->

                            <x-dropdown-link
                                :href="route('users.index')"
                            >

                                {{ __('users.title') }}

                            </x-dropdown-link>


                            <!-- SERVICIOS -->

                            <x-dropdown-link
                                :href="route('service-types.index')"
                            >

                                {{ __('services.title') }}

                            </x-dropdown-link>


                            <!-- FACTURAS -->

                            <x-dropdown-link
                                :href="route('invoices.index')"
                            >

                                {{ __('invoices.title') }}

                            </x-dropdown-link>

                        @endif


                        <!-- =================================================
                             CERRAR SESIÓN
                        ================================================== -->

                        <div class="border-t border-gray-100 my-1"></div>


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="
                                    event.preventDefault();
                                    this.closest('form').submit();
                                "
                            >

                                {{ __('common.logout') }}

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- =================================================
                 HAMBURGER
            ================================================== -->

            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center
                           p-2 rounded-md
                           text-gray-400
                           hover:text-gray-500
                           hover:bg-gray-100
                           focus:outline-none
                           focus:bg-gray-100
                           focus:text-gray-500
                           transition duration-150 ease-in-out"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{
                                'hidden': open,
                                'inline-flex': ! open
                            }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{
                                'hidden': ! open,
                                'inline-flex': open
                            }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- =========================================================
         MENU RESPONSIVE
    ========================================================== -->

    <div
        :class="{
            'block': open,
            'hidden': ! open
        }"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">


            <!-- DASHBOARD -->

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >

                {{ __('dashboard.title') }}

            </x-responsive-nav-link>


            <!-- RECORDS -->

            <x-responsive-nav-link
                :href="route('records.index')"
                :active="request()->routeIs('records.*')"
            >

                {{ __('records.view_records') }}

            </x-responsive-nav-link>


            <!-- COMPAÑÍAS -->

            <x-responsive-nav-link
                :href="route('companies.index')"
                :active="request()->routeIs('companies.*')"
            >

                {{ __('companies.title') }}

            </x-responsive-nav-link>


            <!-- REPORTES -->

            <x-responsive-nav-link
                :href="route('reports.index')"
                :active="request()->routeIs('reports.*')"
            >

                {{ __('reports.title') }}

            </x-responsive-nav-link>


            <!-- BÚSQUEDA GLOBAL -->

            <x-responsive-nav-link
                :href="route('search.global')"
                :active="request()->routeIs('search.global')"
            >

                {{ __('search.title') }}

            </x-responsive-nav-link>


            <!-- ADMINISTRADOR -->

            @if(Auth::user()->role === 'admin')

                <!-- USUARIOS -->

                <x-responsive-nav-link
                    :href="route('users.index')"
                    :active="request()->routeIs('users.*')"
                >

                    {{ __('users.title') }}

                </x-responsive-nav-link>


                <!-- SERVICIOS -->

                <x-responsive-nav-link
                    :href="route('service-types.index')"
                    :active="request()->routeIs('service-types.*')"
                >

                    {{ __('services.title') }}

                </x-responsive-nav-link>


                <!-- FACTURAS -->

                <x-responsive-nav-link
                    :href="route('invoices.index')"
                    :active="request()->routeIs('invoices.*')"
                >

                    {{ __('invoices.title') }}

                </x-responsive-nav-link>

            @endif

        </div>


        <!-- =====================================================
             IDIOMA EN MÓVIL
        ====================================================== -->

        <div class="px-4 py-3 border-t border-gray-200">

            <div
                class="text-xs font-semibold
                       text-gray-400 uppercase mb-2"
            >

                {{ app()->getLocale() === 'en' ? 'Language' : 'Idioma' }}

            </div>


            <div class="flex gap-2">

                <!-- ESPAÑOL -->

                <a
                    href="{{ route('language.change', ['locale' => 'es']) }}"
                    class="px-3 py-2 text-sm rounded-md
                           border border-gray-200
                           hover:bg-gray-50"
                >

                    🇲🇽 Español

                </a>


                <!-- ENGLISH -->

                <a
                    href="{{ route('language.change', ['locale' => 'en']) }}"
                    class="px-3 py-2 text-sm rounded-md
                           border border-gray-200
                           hover:bg-gray-50"
                >

                    🇺🇸 English

                </a>

            </div>

        </div>


        <!-- =====================================================
             DATOS DEL USUARIO
        ====================================================== -->

        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">

                    {{ Auth::user()->name }}

                </div>


                <div class="font-medium text-sm text-gray-500">

                    {{ Auth::user()->email }}

                </div>


                <div class="mt-1 text-xs text-gray-400">

                    @if(Auth::user()->role === 'admin')

                        {{ __('users.administrator') }}

                    @else

                        {{ __('users.general') }}

                    @endif

                </div>

            </div>


            <div class="mt-3 space-y-1">


                <!-- PERFIL -->

                <x-responsive-nav-link
                    :href="route('profile.edit')"
                >

                    {{ __('profile.page_title') }}

                </x-responsive-nav-link>


                <!-- LOGOUT -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="
                            event.preventDefault();
                            this.closest('form').submit();
                        "
                    >

                        {{ __('common.logout') }}

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>
