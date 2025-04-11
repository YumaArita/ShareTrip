<script setup>
const props = defineProps({
    plans: Array,
    schedules: Array,
});
</script>

<template>
    <div class="max-w-screen-lg mx-auto p-5 bg-gray-50 rounded-xl shadow-sm">
        <div class="border-b border-gray-200 pb-4 mb-5">
            <h1 class="text-3xl font-bold mb-1">{{ plans.title }}</h1>
            <p class="text-lg text-gray-600">{{ plans.description }}</p>
        </div>

        <div class="timeline">
            <div v-for="plan in plans" :key="plan.id" class="mb-8">
                <h2 class="text-xl font-bold mb-5">{{ schedules.date }}</h2>
            </div>
        </div>

    </div>
</template>
