<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar producto
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
                                <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/> 
                                <div class="">
                                    <label for="img" style="margin-bottom: .8rem; font-weight: bold;">Cargue una imagen (Opcional)</label>
                                    <input name="img" type="file" @change="onFileChange">
                                </div>
                            </div>
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="product_name" style="margin-bottom: .8rem; font-weight: bold;">Nombre del producto</label>
                                {{ this.productToGet.name }}
                                <input name="product_name" type="text" v-model="form.productName" >
                            </div>
                            
                            <div class="form-control" style="margin-bottom: 2rem;">
                                <label for="message" style="margin-bottom: .8rem; font-weight: bold;">Mensaje</label>
                                <textarea name="message" type="text" height="300" v-model="form.message"></textarea>
                            </div>
                            <button class="mx-auto" style="padding: .5rem;background-color: rgb(57 83 125 / 56%);color: #fff;padding: 1rem;margin: 0 auto;font-size: 13px;">Crear Orden De Compra</button>
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
        props: ['productToGet'],
        components: {
            AppLayout,
        },
        data() {
            return {
                form: {
                    img: null,
                    productName: null,
                    qty: null,
                    driverName: null,
                    driverDni: null,
                    address: null,
                    phone: null,
                    message: null
                },
                imagePreview: null,
                showPreview: false,
            }
        },
        mounted() {
            this.form.productName = this.productToGet.name;
            console.log(this.productToGet);
        },
        methods: {
            submit() { 
                var data = new FormData()
                data.append('name', this.form.productName) 
                data.append('qty', this.form.qty) 
                data.append('img', this.form.img) 
                data.append('driverName', this.form.driverName) 
                data.append('driverDni', this.form.driverDni) 
                data.append('address', this.form.address) 
                data.append('phone', this.form.phone) 
                data.append('message', this.form.message) 
                this.$inertia.post('comprar', this.form)
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
</style>
