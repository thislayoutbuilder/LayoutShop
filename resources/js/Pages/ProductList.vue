<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de productos
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <inertia-table routeName="products-list" :data="allProducts" :columns="columns">
                        <template slot-scope="column" slot="actions">
                            <div style="display:flex">
                                <inertia-link method="post" :data="{ id: column.item.id }" href="/borrar-producto">
                                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
       
                                </inertia-link>
                                <inertia-link method="post" :data="{ id: column.item.id }" href="/edit-product">
                                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
          
                                </inertia-link>
                            </div>
                        </template>

                    </inertia-table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import InertiaTable from 'inertia-table'

    export default {
        components: {
            AppLayout,
            InertiaTable,
        },
        data() {
            return {
                columns: ['id','name','qty','supplier_id', 'created_at', 'updated_at', 'actions']
            }
        },
        props: ['allProducts'],
        mounted() {
            console.log(this.allProducts);
        }
    }
</script>
<style>
.form-control {
    display:flex; 
    flex-direction: column;
}
</style>
