<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 2rem;">
                    <div>
                        <h1 style="margin-bottom: 2rem;">Orden Creada</h1>
                        <button style="padding: .5rem;background-color: rgb(57 83 125 / 56%);color: #fff;padding: 1rem;margin: 0 auto;font-size: 13px;">Crear Producto</button>  
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        } 
    }
</script>
<style>
.form-control {
    display:flex; 
    flex-direction: column;
}
</style>
