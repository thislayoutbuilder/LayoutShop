<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Productos
            </h2>
        </template>
        <div class="bg">
            <div class="">
                <div class="bg-opacity overflow-hidden shadow-xl">
                    <div class="bg-gray-100 dark:bg-gray-900" style="height: calc(100vh - 65px);display: flex;align-items: center;justify-content: center;background-color: rgb(0 0 0 / 76%);">
                    <div style="width: 59%;" class="max-w-6xl mx-auto">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding-top: 3rem;padding-right: 1rem;padding-bottom: 1.1rem;">
                            <div style="display: flex;">
                                <div class="form-control" style="margin-bottom: 2rem;width: 50%;display: flex;align-items: center;justify-content: center;">
                                    <img v-bind:src="imagePreview" width="293px" height="293px" style="margin-bottom: 1rem;height: inherit;object-fit: cover;width: 293px;height: 293px;"/> 
                                    <div class="" style="text-align: center; font-size: 11px!important; display: flex; flex-direction: column;">
                                        <label for="img" style="margin-bottom: .8rem; font-weight: bold; font-size: 11px;">Cargue una imagen para el product</label>
                                        <input name="img" type="file" @change="onFileChange " style="font-size: 10px;" >
                                    </div>
                                </div>
                                <form style="padding: 2rem;width: 50%;display: flex;flex-direction: column;justify-content: center;" @submit.prevent="submit">
                                        <input name="name" v-model="form.name" type="hidden">
                                    
                                    <div class="form-control" style="margin-bottom: 2rem;">
                                        <label for="name">Nombre</label>
                                        <input name="name" v-model="form.name" type="text">
                                    </div>
                                    <div class="form-control" style="margin-bottom: 2rem;">
                                        <label for="qty">Cantidad</label>
                                        <input name="qty" v-model="form.qty" type="text">
                                    </div>
                                    <inertia-link></inertia-link>
                                    <button style="padding: .5rem;background-color: rgb(57 83 125 / 56%);color: #fff;padding: 1rem;margin: 0 auto;font-size: 13px;">Actualizar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
                </div>
            </div>
            
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Options from './Options.vue'

    export default {
        props: ['productToGet'],
        components: {
            AppLayout,
            Welcome,
            Options
        },
        mounted() {
            this.form.name = this.productToGet.name;
            this.form.qty = this.productToGet.qty;
            this.form.id = this.productToGet.id;
            console.log(this.productToGet);
        },
        data() {
            return {
                form: {
                    id: null,
                    name: null,
                    qty: null,
                    img: null
                },
                imagePreview: null,
                showPreview: false,
            }
        },
        methods: {
            submit() { 
                var data = new FormData()
                data.append('name', this.form.name) 
                data.append('qty', this.qty) 
                data.append('img', this.form.img) 
                this.$inertia.post('new-product', this.form)
            },
            onFileChange() {
                this.form.img = event.target.files[0];
                // Aqui creo un lector de archivos para mostrar una vista previa al usuario
                let reader = new FileReader();

                // Agrego un evento al lector para cuando el archivo se cargue, cambiemos la condicion a true y ver la imagen
                reader.addEventListener("load", function() {
                    this.showPreview = true;
                    this.imagePreview = reader.result;
                }.bind(this), false);

                if( this.form.img ){
                    /*
                    Ensure the file is an image file.
                    */
                    if ( /\.(jpe?g|png|gif)$/i.test( this.form.img.name ) ) {

                        console.log("here");
                        /*
                        Fire the readAsDataURL method which will read the file in and
                        upon completion fire a 'load' event which we will listen to and
                        display the image in the preview.
                        */
                        reader.readAsDataURL( this.form.img );
                    }
                }

            }
        }
    }
</script>
<style>
.form-control {
    display:flex; 
    flex-direction: column;
}

.bg {
    background-image: url('/img/dashboard.jpg');
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: bottom;
}
</style>
