<template class="custom-bg"> 
    <div class="ly-main-wrapper">
        <div class="right"></div>
        <jet-authentication-card  class="custom-bg left">
                <template #logo>
                    <!-- <jet-authentication-card-logo /> -->
                    <div class="logo-wrapper">
                        <img :src="'/img/logo.png'" class="main-logo">
                        <h1 id="login-heading">Keep your collection safe</h1>
                    </div>
                    
                </template>

                <jet-validation-errors class="mb-4" />

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <div class="custom-form">
                    <form @submit.prevent="submit">
                        <div class="input-wrapper">
                            <jet-label for="email" value="Username" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                        </div>

                        <div class="input-wrapper">
                            <jet-label for="password" value="Password" />
                            <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                        </div>

                        <!-- <div class="block mt-4">
                            <label class="flex items-center">
                                <jet-checkbox name="remember" v-model="form.remember" />
                                <span class="ml-2 text-sm text-gray-600">Recuerdame</span>
                            </label>
                        </div> -->

                        <div class="flex items-center justify-end mt-4">
                            <!-- <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                ¿Olvidaste tu contraseña?
                            </inertia-link> -->
                            <div class="login-button-wrapper">
                                <jet-button class="mx-auto" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Login
                                </jet-button>
                                <a class="login-opt">Having Troubles to log in?</a>
                                <a class="login-opt">Create Account</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
        </jet-authentication-card>
        
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>

<style lang="css">
.ly-main-wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
}

.left {
    width: 60%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #008ac3;
}

.right {
    width: 40%;
    height: 100%;
    background-color: #000;
    background-image: url(/img/login.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

#login-heading {
    font-size: 24px;
    color: #040404;
    text-shadow: 1px 1px rgb(255 196 194);
    line-height: 1;
    font-weight: bold;
}

.main-logo {
    width: 90%;
    max-width: 213px;
    image-rendering: optimizequality;
    image-rendering: auto;
}

.logo-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.ly-main-wrapper .bg-white {
    box-shadow: none;
    border: 0;
    background-color: transparent!important;
    padding: 0 1rem;
}

.ly-main-wrapper label {
    font-weight: bold;
    font-size: 15px;
    color: #ffc4c2;
}

.ly-main-wrapper .input-wrapper {
    min-height: 64.78px;
    margin-bottom: 1rem;
}
/* i dont want to know anything bout bitches my heart is full of stiches i want real love inside my mind i want i want news, i want a pretty girl by my side, at least if she fail she wont tell lies */
.ly-main-wrapper input {
    outline: none;
    padding: .4rem 1rem;
    background-color: #ffffff;
    border: 1px solid #000000;
    border-radius: 0;
    outline: none;
}

.ly-main-wrapper input:focus {
    border: 2px solid #000000;
    outline: none;
}

.ly-main-wrapper button {
    height: 45px;
    padding: 0 4rem;
    margin-top: 0;
    border: none;
    outline: none;
    margin-bottom: 0;
    font-weight: bold;
    color: #008ac3;
    box-shadow: 1px 1px 3px 0px rgba(58, 127, 180, 0.33);
    cursor: pointer;
    background-color: #efefef;
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 14px;
    line-height: 1;
    margin-bottom: .5rem;
}

.login-button-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.login-opt {
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    padding: .5rem 0;
}
</style>