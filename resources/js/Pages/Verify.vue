<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Proveedores
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <inertia-table routeName="supplier-list" :data="allOrders" :columns="columns">
                        <template slot-scope="column" slot="actions">
                            <div style="display:flex">
                                <inertia-link method="post" :data="{ id: column.item.id }" href="/verify-order">
                                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
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
                columns: ['id','product_name','quantity', 'phone', 'status', 'driver_dni', 'driver_name', 'actions', 'address', 'created_at']
            }
        },
        props: ['allOrders'],
        mounted() {
            console.log(this.allOrders);
        }
    }
</script>
<style>
.form-control {
    display:flex; 
    flex-direction: column;
}
</style>
