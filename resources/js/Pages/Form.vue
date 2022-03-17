<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="mt-5 md:mt-0 md:col-span-2">
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
                                <jet-label for="city" value="Ciudad" />
                                <jet-input id="city" type="text" class="mt-1 block w-full" v-model="form.city" required autofocus autocomplete="City" />
                            </div>

                            <div class="mt-4">
                                <jet-label for="department" value="Departamento" />
                                <jet-input id="department" type="text" class="mt-1 block w-full" v-model="form.department" required autofocus autocomplete="department" />
                            </div>

                             <!-- Rol -->
                            <div class="col-span-6 sm:col-span-4 mt-4">
                                <jet-label for="rol_id" value="Rol" />
                                <select id="rol_id" class="mt-1 block w-full" v-model="form.rol_id">
                                <option selected value="0">Seleccione un rol</option>
                                <option v-for="rol in roles" :key="rol.id" :value="rol.id">{{ rol.description }}</option>
                                </select>
                                <jet-input-error :message="form.errors.rol_id" class="mt-2" />
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
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'

    export default defineComponent({
        components: {
            AppLayout,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    lastname: '',
                    email: '',
                    city: '',
                    department: '',
                    rol_id: ''
                })
            }
        },
         props: {
           roles: Array
        },
        methods: {
            submit() {
                this.form.post(this.route('users.store'), {
                    onFinish: () => this.form.reset('name', 'lastname'),
                })
            }
        }
})
</script>
