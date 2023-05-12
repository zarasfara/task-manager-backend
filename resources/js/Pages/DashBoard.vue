<template>
    <Layout>
        <form @submit.prevent="form.post(route('update-user'))"
              class="flex justify-around">
            <div class="overflow-hidden w-fit">
                <img id="uploadedImage" v-if="status" class="rounded-full w-36" :src="user.avatar" alt="user_image">
                <div v-else
                     class="flex justify-center items-center animate-pulse w-36 h-36 bg-gray-300 rounded-full sm:w-96">
                    <svg class="w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                         fill="currentColor" viewBox="0 0 640 512">
                        <path
                            d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/>
                    </svg>
                </div>
            </div>
            <div class="desktop:ml-4 p-2 py-0 flex w-full flex-wrap">
                <div class="w-2/4 px-1.5">
                    <label for="first_name" class="block mt-0 text-sm font-medium text-gray-900">Имя</label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded leading-4
                               focus:ring-emerald-300 focus:border-emerald-300 block w-full p-2.5"
                           v-model="form.name"
                    >
                    <div class="text-red-500 text-sm text-sm" v-if="errors.name">{{ errors.name }}</div>

                    <label for="second_name" class="block text-sm font-medium text-gray-900 mt-2">Фамилия</label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded leading-4
                                  focus:ring-emerald-300 focus:border-emerald-300 block w-full p-2.5"
                           v-model="form.surname"
                    >
                    <div v-if="errors.surname">{{ errors.surname }}</div>
                </div>
                <div class="w-2/4 px-1.5">
                    <label for="second_name" class="block text-sm font-medium text-gray-900 ">Ник </label>
                    <input type="text" id="nickname"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded leading-4
                                               focus:ring-emerald-300 focus:border-emerald-300 block w-full p-2.5"
                           v-model="form.nickname"
                    >
                    <div class="text-red-500 text-sm" v-if="errors.name">{{ errors.nickname }}</div>

                    <label for="email" class="block text-sm font-medium text-gray-900 mt-2">Почта </label>
                    <input type="text" id="nickname"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded leading-4
                                                focus:ring-emerald-300 focus:border-emerald-300 block w-full p-2.5"
                           v-model="form.email"
                    >
                    <div class="text-red-500 text-sm" v-if="errors.name">{{ errors.email }}</div>
                </div>
                <div class="flex px-1.5">
                    <label for="upload-image" class="block w-full text-sm text-white
                                                  cursor-pointer py-2 px-4 mt-2
                                                  rounded border-0
                                                  text-center
                                                  text-sm font-semibold
                                                  bg-emerald-400 hover:bg-emerald-500 mr-2">
                        Изображение
                    </label>
                    <input id="upload-image" type="file" class="hidden"
                           @input="form.avatar = $event.target.files[0]"
                           @change="previewImageUpload" />

                    <div v-if="errors.name">{{ errors.avatar }}</div>
                    <button class="block w-full text-sm text-white cursor-pointer py-2 px-4 mt-2 rounded border-0
                                text-center text-sm font-semibold bg-emerald-400 hover:bg-emerald-500"
                            :disabled="form.processing" type="submit">Подтвердить
                    </button>
                </div>
            </div>
        </form>
    </Layout>
</template>

<script>
import Layout from "@/Shared/Layout.vue";
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    name: "DashBoard",
    data() {
        return {
            status: false,
        }
    },
    props: [
        'errors',
        'user'
    ],
    components: {
        Layout
    },
    setup(props) {
        const form = useForm({
            nickname: props.user.nickname,
            surname: props.user.surname,
            name: props.user.name,
            email: props.user.email,
            avatar: null,
            _method: 'PUT'
        })

        return { form }
    },
    methods: {
        previewImageUpload(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("uploadedImage");
                preview.src = src;
            }
        }
    },
    mounted() {
        this.status = true
    }
}
</script>
