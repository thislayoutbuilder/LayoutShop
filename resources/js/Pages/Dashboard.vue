<template>
    <app-layout>

        <div class="bg">
            <div class="">
                <div class="bg-opacity overflow-hidden shadow-xl">
                    <options /> 
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
        components: {
            AppLayout,
            Welcome,
            Options
        } 
    }
</script>
<style>
.bg {
    background-image: url('/img/dashboard.jpg');
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: bottom;
}

.bg-opacity {
    background-color: rgb(0 0 0 / 21%);
}
</style>