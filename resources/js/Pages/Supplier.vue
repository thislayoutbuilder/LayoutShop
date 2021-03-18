<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Registrar Proveedor
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <form style="padding: 2rem;" @submit.prevent="submit">
                            <!-- <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="img" style="margin-bottom: .8rem; font-weight: bold;">Cargue imagen o logo para el product</label>
                                <input name="name" type="file">
                            </div> -->
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="name" style="margin-bottom: .8rem; font-weight: bold;">Nombre</label>
                                <input name="name" type="text" v-model="form.name">
                            </div>
                            <!-- 
                                $table->string('city');
                                $table->string('state');
                                $table->string('phone_number');
                                $table->boolean('status');
                             -->
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="city" style="margin-bottom: .8rem; font-weight: bold;">Ciudad</label>
                                <input name="city" type="text" v-model="form.city">
                            </div>
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="state" style="margin-bottom: .8rem; font-weight: bold;">Estado</label>
                                <select name="state" v-model="form.state">
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Anzoátegui">Anzoátegui</option>
                                    <option value="Apure">Apure</option>
                                    <option value="Aragua">Aragua</option>
                                    <option value="Barinas">Barinas</option>
                                    <option value="Bolívar">Bolívar</option>
                                    <option value="Carabobo">Carabobo</option>
                                    <option value="Cojedes">Cojedes</option>
                                    <option value="Delta Amacuro">Delta Amacuro</option>
                                    <option value="Distrito Capital">Distrito Capital</option>
                                    <option value="Falcón">Falcón</option>
                                    <option value="Guárico">Guárico</option>
                                    <option value="Lara">Lara</option>
                                    <option value="Mérida">Mérida</option>
                                    <option value="Miranda">Miranda</option>
                                    <option value="Monagas">Monagas</option>
                                    <option value="Nueva Esparta">Nueva Esparta</option>
                                    <option value="Portuguesa">Portuguesa</option>
                                    <option value="Sucre">Sucre</option>
                                    <option value="Táchira">Táchira</option>
                                    <option value="Trujillo">Trujillo</option>
                                    <option value="Vargas">Vargas</option>
                                    <option value="Yaracuy">Yaracuy</option>
                                    <option value="Zulia">Zulia</option>
                                </select>
                                <!-- <input name="city" type="text"> -->
                            </div>
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="phone_number" style="margin-bottom: .8rem; font-weight: bold;">Numero de telefono</label>
                                <input name="phone_number" type="text" v-model="form.phone_number">
                            </div>
                            <button style="padding: .5rem;background-color: rgb(57 83 125 / 56%);color: #fff;padding: 1rem;margin: 0 auto;font-size: 13px;">Registrar Proveedor</button>
                       
                        </form>
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
        },
        data() {
            return {
                form: {
                    name: null,
                    city: null,
                    state: null,
                    phone_number: null,
                    status: true
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('create-supplier', this.form)
            }
        }
    }
</script>
<style>
.form-control {
    display:flex; 
    flex-direction: column;
}
</style>
