<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const isDarkMode = ref(true);
const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    localStorage.setItem('darkMode', isDarkMode.value);
};

onMounted(() => {
    const savedMode = localStorage.getItem('darkMode');
    if (savedMode !== null) {
        isDarkMode.value = savedMode === 'true';
    } else {
        isDarkMode.value = window.matchMedia('(prefers-color-scheme: dark)').matches;
    }
});

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password', 'password_confirmation'),
        preserveScroll: true,
    })
}

</script>
<template>
    <div :class="[
        'min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8',
        isDarkMode ? 'bg-[#0a0a0a]' : 'bg-gray-100'
    ]">
        <div :class="[
            'relative p-8 rounded-2xl w-full max-w-md overflow-hidden',
            isDarkMode ? 'bg-gradient-to-b from-[#1a1a1a] to-[#0f0f0f] shadow-[0_0_25px_rgba(255,255,255,0.07)] border-[#2a2a2a]' : 'bg-gradient-to-b from-white to-gray-50 shadow-lg border-gray-200'
        ]" class="border">
            <button @click="toggleTheme" class="absolute top-4 right-4 z-20">
                <svg v-if="isDarkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
            </button>
            
            <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full opacity-20 blur-3xl" :class="isDarkMode ? 'bg-[#303030]' : 'bg-blue-200'"></div>
            <div class="absolute -bottom-16 -left-16 w-48 h-48 rounded-full opacity-20 blur-3xl" :class="isDarkMode ? 'bg-[#404040]' : 'bg-indigo-200'"></div>
            
            <h1 :class="[
                'text-4xl font-bold mb-1 text-center bg-clip-text text-transparent',
                isDarkMode ? 'bg-gradient-to-r from-white to-[#a0a0a0]' : 'bg-gradient-to-r from-gray-800 to-gray-600'
            ]">ログイン</h1>
            
            <form @submit.prevent="submit" class="space-y-5 relative z-10">
                <div>
                    <label for="email" :class="[
                        'block text-sm font-medium mb-1', 
                        isDarkMode ? 'text-[#b0b0b0]' : 'text-gray-700'
                    ]">メールアドレス</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3" :class="isDarkMode ? 'text-[#707070]' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            :class="[
                                'w-full rounded-xl pl-10 pr-3 py-3 transition-all duration-200',
                                isDarkMode ? 'bg-[#161616] border-[#2a2a2a] focus:ring-white/50 focus:border-[#444] text-white' : 'bg-white border-gray-300 focus:ring-blue-300 focus:border-blue-400 text-gray-900'
                            ]"
                            class="border focus:ring-1"
                        >
                    </div>
                    <p v-if="form.errors.email" class="mt-1 text-red-400 text-sm">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label for="password" :class="[
                        'block text-sm font-medium mb-1', 
                        isDarkMode ? 'text-[#b0b0b0]' : 'text-gray-700'
                    ]">パスワード</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3" :class="isDarkMode ? 'text-[#707070]' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input
                            v-model="form.password"
                            type="password"
                            id="password"
                            autocomplete="new-password"
                            :class="[
                                'w-full rounded-xl pl-10 pr-3 py-3 transition-all duration-200',
                                isDarkMode ? 'bg-[#161616] border-[#2a2a2a] focus:ring-white/50 focus:border-[#444] text-white' : 'bg-white border-gray-300 focus:ring-blue-300 focus:border-blue-400 text-gray-900'
                            ]"
                            class="border focus:ring-1"
                        >
                    </div>
                    <p v-if="form.errors.password" class="mt-1 text-red-400 text-sm">{{ form.errors.password }}</p>
                </div>

                <button type="submit" :class="[
                    'w-full mt-8 py-3 px-4 rounded-xl transition-all duration-300 font-medium text-lg',
                    isDarkMode ? 'bg-gradient-to-r from-[#303030] to-[#1a1a1a] text-white border-[#444] hover:shadow-[0_0_15px_rgba(255,255,255,0.1)] hover:border-[#555]' : 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-transparent hover:shadow-md'
                ]" class="border" :disabled="form.processing">
                    <span v-if="form.processing">ログイン中...</span>
                    <span v-else>ログイン</span>
                </button>
            </form>
        </div>
    </div>
</template>