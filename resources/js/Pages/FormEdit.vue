<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar usuario
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-validation-errors class="mb-4" />
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <form @submit.prevent="submit">
                        <div>
                            <jet-label for="name" value="Nombre" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="lastname" value="Apellido" />
                            <jet-input id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" required autofocus autocomplete="lastname" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="email" value="Correo" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                        </div>

                         <div class="mt-4">
                            <jet-label for="password" value="Contraseña" />
                            <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="password_confirmation" value="Confirme Contraseña" />
                            <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="city" value="Ciudad" />
                            <jet-input id="city" type="text" class="mt-1 block w-full" v-model="form.city" required autofocus autocomplete="City" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="department" value="Departamento" />
                            <jet-input id="department" type="text" class="mt-1 block w-full" v-model="form.department" required autofocus autocomplete="department" />
                        </div>

                            <!-- Rol -->
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <jet-label for="rol" value="Rol" />
                            <select id="rol" class="mt-1 block w-full" v-model="form.rol">
                            <option >Seleccione un rol</option>
                            <option v-for="rol in roles" :key="rol.id" :value="rol.description">{{ rol.description }}</option>
                            </select>
                            <jet-input-error :message="form.errors.rol" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Guardar
                            </jet-button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>

    </app-layout>
</template>

<script>

    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            JetFormSection,
            JetActionMessage,
            JetActionSection,
            JetButton,
            JetInput,
            JetInputError,
            JetValidationErrors,
            JetLabel,
            AppLayout,
        },

        data() {
            return {
                    form: this.$inertia.form({
                    name: this.user.name,
                    lastname: this.user.lastname,
                    email: this.user.email,
                    password: '',
                    password_confirmation: '',
                    city: this.user.city,
                    department: this.user.department,

                }),
            }
        },

        props: ['user', 'roles'],
        remember: 'form',

        methods: {
            submit(){
                this.$inertia.put(
                    route("users.update", this.$props.user.id),
                    this.form
                );
            }

        }
}
</script>
