<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}

</script>
<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">新規登録</h1>
        </div>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium">名前</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    class="w-full border rounded px-3 py-2"
                >
                <p v-if="form.errors.name" class="mt-1 text-red-500 text-sm">{{ form.errors.name }}</p>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium">メールアドレス</label>
                <input
                    v-model="form.email"
                    type="email"
                    id="email"
                    class="w-full border rounded px-3 py-2"
                >
                <p v-if="form.errors.email" class="mt-1 text-red-500 text-sm">{{ form.errors.email }}</p>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium">パスワード</label>
                <input
                    v-model="form.password"
                    type="password"
                    id="password"
                    class="w-full border rounded px-3 py-2"
                >
                <p v-if="form.errors.password" class="mt-1 text-red-500 text-sm">{{ form.errors.password }}</p>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition" disabled="form.prosessing">
                登録する
            </button>
        </form>
        <h1>Register</h1>
    </div>
</template>