<template>
    <div class="relative flex items-top justify-center sm:items-center sm:pt-0 pb-8" style="height: calc(100vh - 65px);">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-sm text-gray-700 underline">
                Rivero Fuentes
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Login
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </inertia-link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto">
           

            <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 pb-14 pt-14">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <span class="text-gray-900 dark:text-white">Productos</span>
                            </div>
                        </div>

                        <div class="ml-12 mb-1">
                            <div class="text-lg leading-7 font-semibold">
                                <inertia-link :href="route('products')">
                                    <span href="https://laravel.com/docs" class="mt-2 text-sm" style="color: rgb(160 201 255);">Crear nuevos productos</span>
                                </inertia-link>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="text-lg leading-7 font-semibold">
                                <inertia-link :href="route('products-list')">
                                    <span href="https://laravel.com/docs" class="mt-2 text-sm" style="color: rgb(160 201 255);">Ver lista de productos</span>
                                </inertia-link>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pb-14 pt-14 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                    <span href="https://laravel.com/docs" class="text-gray-900 dark:text-white">Proveedores</span>
                            </div>
                        </div>

                        <div class="ml-12 mb-1">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <inertia-link :href="route('supplier')">
                                    <span class="text-gray-900 dark:text-white" style="color: rgb(160 201 255);">Registra nuevos proveedores</span>
                                </inertia-link>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="text-lg leading-7 font-semibold">
                                <inertia-link :href="route('supplier-list')">
                                    <span class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="color: rgb(160 201 255);">Ver lista de proveedores</span>
                                </inertia-link>
                            </div>
                        </div>

                        
                    </div>

                    <div class="p-6 pb-14 pt-14 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <span href="https://laravel.com/docs" class="text-gray-900 dark:text-white" >Crear orden de compra</span>
                            </div>
                        </div>

                        <!-- <div class="flex items-center">
                            <div class="text-lg leading-7 font-semibold">
                                <inertia-link :href="route('comprar')">
                                    <span class="mt-2 text-gray-600 dark:text-gray-400 text-sm">Crear orden de compra</span>
                                </inertia-link>
                            </div>
                        </div> -->
                        

                        <div class="ml-12">
                            <inertia-link :href="route('comprar')">
                                <span href="https://laravel.com/docs" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="color: rgb(160 201 255);">Crea nuevos pedidos a algun proveedor registrado en el sistema</span>
                            </inertia-link>
                            <div >
                                </div>
                        </div>
                    </div>

                    <div class="p-6 pb-14 pt-14 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Verificar ordenes de compras</div>
                        </div>

                        <div class="ml-12">
                            <inertia-link :href="route('verify')">
                                <span href="https://laravel.com/docs" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="color: rgb(160 201 255);">Revisar ordenes y Verificar</span>
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
