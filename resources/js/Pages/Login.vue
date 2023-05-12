<template>
    <section class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="form.post('/login')">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        email
                    </label>

                    <input
                        class=" rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                            focus:ring-emerald-300 focus:border-emerald-300"
                        id="email" type="email" placeholder="email" v-model="form.email"
                        :class="errors.email ? 'border-red-500' : ''">

                    <p v-if="errors.email " class="text-red-500 text-xs">
                        {{ errors.email }}</p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>

                    <input
                        class="rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none
                            focus:shadow-outline focus:ring-emerald-300 focus:border-emerald-300"
                        placeholder="password"
                        id="password" type="password" v-model="form.password"
                        :class="errors.password ? 'border-red-500' : ''">

                    <p v-if="errors.password" class="text-red-500 text-xs">
                        {{ errors.password }}</p>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-primary-500 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Войти
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>

<script>

import { useForm } from "@inertiajs/inertia-vue3";

export default {
    name: "Login",
    props: [
        'errors',
    ],
    setup() {
        const form = useForm({
            email: null,
            password: null
        })

        return { form }
    },

}
</script>

<style scoped>

</style>
